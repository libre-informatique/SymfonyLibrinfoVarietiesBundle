<?php

namespace Librinfo\VarietiesBundle\Admin;

use Librinfo\CoreBundle\Admin\CoreAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class VarietyDescriptionAdmin extends CoreAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('group')
            ->add('field')
            ->add('value')
            ->add('id')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('group')
            ->add('field')
            ->add('value')
            ->add('id')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $vd_config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties')['variety_descriptions'];
        $fieldset = $this->subject->getFieldset();
        $field = $this->subject->getField();
        $config = empty($vd_config[$fieldset][$field]) ? '' : $vd_config[$fieldset][$field];
        
        $type = empty($config['widget']) ? 'text' : $config['widget']; // TODO: limit types ?
        $options = empty($config['options']) ? [] : $config['options'];
        if (!isset($options['label']) || !$options['label'])
            $options['label'] = sprintf("librinfo_description_%s_%s", $fieldset, $field);

        $formMapper
            ->add('fieldset', 'hidden')
            ->add('field', 'hidden')
            ->add('id', 'hidden')
            ->add('value', $type, $options)
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('group')
            ->add('field')
            ->add('value')
            ->add('id')
        ;
    }
}
