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
        $fields = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties')['strain_disabled_fields'];

        $mapper->getFormBuilder()->addEventListener(FormEvents::POST_SET_DATA, function ($event) use ($admin, $mapper, $fields) {
            $subject = $admin->getSubject($event->getData());
            $form = $event->getForm();

            if ( $subject->getIsStrain() )
            {
                foreach ( $fields as $fieldName )
                {
                    $field = $form->get($fieldName);

                    $config = $field->getConfig();
                    $options = $config->getOptions();
                    $options['read_only'] = true;
                    $type = $config->getType()->getName();

                    $form->remove($fieldName);

                    if ( in_array($type, ['sonata_type_model', 'sonata_type_model_autocomplete', 'entity', 'choice', 'librinfo_customchoice']) )
                        $options['disabled'] = true;

                    $form->add($fieldName, $type, $options);
                }

                $this->removeChildren($mapper, $form);
            } else if ( null == $subject->getId() )
            {
                $this->removeChildren($mapper, $form);
                $this->removeParent($mapper, $form);
            } else
            {
                $this->removeParent($mapper, $form);
            }
        });
    }

    public function getFormTheme()
    {
        return array_merge(
                parent::getFormTheme(), array('LibrinfoVarietiesBundle:Form:form_admin_fields.html.twig')
        );
    }

    protected function removeParent($mapper, $form)
    {
        $mapper->remove('parent');
        $form->remove('parent');
    }

    protected function removeChildren($mapper, $form)
    {
        $tabs = $mapper->getAdmin()->getFormTabs();
        unset($tabs['form_tab_strains']);
        $mapper->getAdmin()->setFormTabs($tabs);
        $form->remove('children');
    }

}
