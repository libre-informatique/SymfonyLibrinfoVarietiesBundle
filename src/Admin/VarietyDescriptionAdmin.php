<?php

/*
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Librinfo\VarietiesBundle\Admin;

use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\EmbeddedAdmin;
use Blast\UtilsBundle\Form\Type\CustomChoiceType;
use Sonata\AdminBundle\Form\FormMapper;

class VarietyDescriptionAdmin extends CoreAdmin
{
    use EmbeddedAdmin;

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $vd_config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties')['variety_descriptions'];
        $fieldset = $this->subject->getFieldset();
        $field = $this->subject->getField();
        $config = empty($vd_config[$fieldset][$field]) ? '' : $vd_config[$fieldset][$field];
        $type = isset($config['type']) ? $config['type'] : 'textarea';
        $choiceType = CustomChoiceType::class;
        $options = empty($config['options']) ? [] : $config['options'];

        if (isset($options['choices']) && empty($options['choices']))
            unset($options['choices']);

        if (isset($options['choices_class']) && $type != $choiceType)
            unset($options['choices_class']);

        if (isset($options['blast_choices']) && $type != $choiceType)
            unset($options['blast_choices']);

        if (!isset($options['label']) || !$options['label'])
            $options['label'] = sprintf("librinfo_description_%s_%s", $fieldset, $field);

        if (!isset($options['help']) || !$options['help'])
            $options['help'] = sprintf("librinfo.help.%s", $field);

        $formMapper
            ->add('fieldset', 'hidden')
            ->add('field', 'hidden')
            ->add('id', 'hidden')
            ->add('value', $type, $options)
        ;
    }
}
