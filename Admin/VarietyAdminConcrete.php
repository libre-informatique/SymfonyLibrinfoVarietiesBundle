<?php

namespace Librinfo\VarietiesBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Librinfo\CoreBundle\Admin\Traits\HandlesRelationsAdmin;
use Librinfo\VarietiesBundle\Traits\DynamicDescriptions;

class VarietyAdminConcrete extends VarietyAdmin
{
    use HandlesRelationsAdmin
    {
        configureFormFields as configFormHandlesRelations;
    }
    use DynamicDescriptions;
    
    protected function configureFormFields(FormMapper $mapper)
    {
        $this->configFormHandlesRelations($mapper);
        $this->configureDynamicDescriptions($mapper);  
    }
      
    public function getFormTheme()
    {
        return array_merge(
                parent::getFormTheme(), array('LibrinfoVarietiesBundle:Form:form_admin_fields.html.twig')
        );
    }
}
