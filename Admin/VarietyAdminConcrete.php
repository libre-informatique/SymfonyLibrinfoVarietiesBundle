<?php

namespace Librinfo\VarietiesBundle\Admin;

use Symfony\Component\Form\FormEvents;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Librinfo\CoreBundle\Admin\Traits\HandlesRelationsAdmin;
use Librinfo\VarietiesBundle\Traits\DynamicDescriptions;

class VarietyAdminConcrete extends VarietyAdmin
{

    use HandlesRelationsAdmin {
        configureFormFields as configFormHandlesRelations;
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

    protected function configureFormFields(FormMapper $mapper)
    {
        $this->configFormHandlesRelations($mapper);
        $this->configureDynamicDescriptions($mapper);

        $admin = $this;

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

    public function getFormTheme()
    {
        return array_merge(
                parent::getFormTheme(), array('LibrinfoVarietiesBundle:Form:form_admin_fields.html.twig')
        );
    }

}
