<?php

namespace Librinfo\VarietiesBundle\Admin;

use Symfony\Component\Form\FormEvents;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Librinfo\CoreBundle\Admin\Traits\HandlesRelationsAdmin;
use Librinfo\VarietiesBundle\Traits\DynamicDescriptions;

class VarietyAdminConcrete extends VarietyAdmin
{

    use HandlesRelationsAdmin {
        configureFormFields as configFormHandlesRelations;
        configureShowFields as configShowHandlesRelations;
    }

    use DynamicDescriptions;

    /**
     * Configure routes for list actions
     * 
     * @param RouteCollection $collection
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->add('strain');
    }

    /**
     * Configure create/edit form fields 
     * 
     * @param FormMapper 
     */
    protected function configureFormFields(FormMapper $mapper)
    {
        //calls to methods of traits
        $this->configFormHandlesRelations($mapper);
        $this->configureDynamicDescriptions($mapper);
        
        // $this into a variable to use it in closure
        $admin = $this;
        
        //Form event listener to remove children form tab if object is a strain
        $mapper->getFormBuilder()->addEventListener(FormEvents::POST_SET_DATA, function ($event) use ($admin, $mapper) {
            $subject = $admin->getSubject($event->getData());
            $form = $event->getForm();

            if ( $subject->getIsStrain() )
            {
                $tabs = $mapper->getAdmin()->getFormTabs();
                unset($tabs['form_tab_strains']);
                $mapper->getAdmin()->setFormTabs($tabs);
                $form->remove('children');
            }
        });
 
    }
    
    /**
     * Configure Show view fields
     * 
     * @param ShowMapper $mapper
     */
    protected function configureShowFields(ShowMapper $mapper)
    {
        // call to aliased trait method
        $this->configShowHandlesRelations($mapper);
        
        //Remove parent field if object is a strain
        if( $this->getSubject() )
            if( $this->getSubject()->getIsStrain() )
                $mapper->remove('parent');
    }
    
    //prevent primary key loop
    public function prePersist($variety)
    {
        parent::prePersist($variety);
        
        if( $variety->getParent() )
            if( $variety->getParent()->getId() == $variety->getId() )
            $variety->setParent(NULL);
    }
    
}
