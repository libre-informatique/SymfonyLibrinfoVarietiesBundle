<?php

namespace Librinfo\VarietiesBundle\Admin;

use Librinfo\CoreBundle\Admin\CoreAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Librinfo\VarietiesBundle\Entity\SelectChoice;

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

        $type = isset($config['type']) ? $config['type'] : 'textarea'; // TODO: limit types ?

        $options = empty($config['options']) ? [] : $config['options'];

        if (isset($options['choices']) && $type == 'librinfo_customchoice')
        {
            $manager = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager();
            $repo = $manager->getRepository('LibrinfoVarietiesBundle:SelectChoice');
            $label = $fieldset . '_' . $field;
            foreach ($options['choices'] as $choice)
            {
                if ($repo->findBy(array('label' => $label, 'value' => $choice)) == null)
                {
                    $newChoice = new SelectChoice();
                    $newChoice->setLabel($label);
                    $newChoice->setValue($choice);

                    $manager->persist($newChoice);                   
                }
            }
            $manager->flush();
        }
        unset($options['choices']);
        
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
