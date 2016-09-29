<?php

namespace Librinfo\VarietiesBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Librinfo\CoreBundle\Admin\Traits\EmbeddedAdmin;

class VarietyDescriptionAdminConcrete extends VarietyDescriptionAdmin
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
        $choiceType = 'librinfo_customchoice';
        $options = empty($config['options']) ? [] : $config['options'];
        
        if (isset($options['choices']) && empty($options['choices']))
            unset($options['choices']);
        
        if (isset($options['choices_class']) && $type != $choiceType)
            unset($options['choices_class']);
        
        if (isset($options['librinfo_choices']) && $type != $choiceType)
            unset($options['librinfo_choices']);
        
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