<?php

namespace Librinfo\VarietiesBundle\Admin;

use Sonata\AdminBundle\Form\FormMapper;
use Librinfo\CoreBundle\Admin\Traits\HandlesRelationsAdmin;
use Librinfo\VarietiesBundle\Traits\DynamicDescriptions;

class StrainAdminConcrete extends StrainAdmin
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
}