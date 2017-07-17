<?php

/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Librinfo\VarietiesBundle\Filter;

use Doctrine\ORM\QueryBuilder;
use Librinfo\VarietiesBundle\Form\Type\VarietyDescriptionFilterType;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Sonata\DoctrineORMAdminBundle\Filter\Filter;

class VarietyDescriptionFilter extends Filter
{
    /**
     * @param ProxyQueryInterface|QueryBuilder $queryBuilder
     *
     * {@inheritdoc}
     */
    public function filter(ProxyQueryInterface $queryBuilder, $alias, $field, $data)
    {
        if (!$data || !is_array($data) || !array_key_exists('value', $data) || !$data['value']['Value']) {
            return;
        }

        $operator = '=';
        $value = $data['value']['Value'];
        $name = $this->getName();

        $queryBuilder->entityJoin(array(
            $name => array(
                'fieldName' => $name,
            ), )
        );

        if ($data['type'] == 1) {
            $operator = 'LIKE';
            $value = '%' . $value . '%';
        } elseif ($data['type'] == 2) {
            $operator = 'NOT LIKE';
            $value = '%' . $value . '%';
        }

        $this->applyWhere($queryBuilder, sprintf('s_%s.field = :field', $name));
        $queryBuilder->setParameter('field', $data['value']['Field']);

        $this->applyWhere($queryBuilder, sprintf('s_%s.value %s :value', $name, $operator));
        $queryBuilder->setParameter('value', $value);
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultOptions()
    {
        return array(
            'fieldset' => $this->getName(),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getRenderSettings()
    {
        return array('sonata_type_filter_default', array(
                'operator_type' => 'sonata_type_equal',
                'field_type' => VarietyDescriptionFilterType::class,
                'field_options' => array_merge($this->getDefaultOptions(), $this->getFieldOptions()),
                'label' => $this->getLabel(),
        ));
    }
}
