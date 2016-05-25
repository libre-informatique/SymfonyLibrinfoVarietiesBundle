<?php

namespace Librinfo\VarietiesBundle\Admin;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
use Doctrine\Common\Collections\ArrayCollection;
use Sonata\AdminBundle\Form\FormMapper;
use Librinfo\CoreBundle\Admin\Traits\HandlesRelationsAdmin;

class VarietyAdminConcrete extends VarietyAdmin
{
    use HandlesRelationsAdmin;

    public function getFormTheme()
    {
        return array_merge(
            parent::getFormTheme(),
            array('LibrinfoVarietiesBundle:Form:form_admin_fields.html.twig')
        );
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        // HandlesRelationsAdmin::configureFormFields

         $this->configureFields(__FUNCTION__, $formMapper, $this->getGrandParentClass());
        // relationships that will be handled by CollectionsManager
        $type = 'sonata_type_collection';
        foreach ( $this->formFieldDescriptions as $fieldname => $fieldDescription )
        if ( $fieldDescription->getType() == $type )
            $this->addManagedCollections($fieldname);
        // relationships that will be handled by ManyToManyManager
        foreach ( $this->formFieldDescriptions as $fieldname => $fieldDescription )
        {
            $mapping = $fieldDescription->getAssociationMapping();
            if ( $mapping['type'] == ClassMetadataInfo::MANY_TO_MANY && !$mapping['isOwningSide'] )
                $this->addManyToManyCollections($fieldname);
        }

        // END HandlesRelationsAdmin::configureFormFields

        // Manage VarietyDescriptions according to configurationsettings
        $config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties')['variety_descriptions'];
        $admin = $this;
        $formMapper->getFormBuilder()->addEventListener(FormEvents::PRE_SET_DATA,
            function ($event) use ($admin, $config)
            {
                $subject = $admin->getSubject($event->getData());

                // Hide VarietyDescriptions that are not found in configuration
                foreach ( $subject->getVarietyDescriptions() as $desc ) {
                    $found = false;
                    foreach ( $config as $fieldset => $fields )
                    foreach ( $fields as $field => $settings )
                    if ( $desc->getFieldset() == $fieldset && $desc->getField() == $field ) {
                        $found = true;
                        break;
                    }
                    if ( !$found )
                        $subject->removeVarietyDescription($desc);
                }

                // Create missing VarietyDescriptions (described in configuration and not present in the Variety)
                foreach ( $config as $fieldset => $fields )
                foreach ( $fields as $field => $settings )
                {
                    $exists = $subject->getVarietyDescriptions()->exists(function($key, $element) use ($fieldset, $field) {
                        return $element->getFieldset() == $fieldset && $element->getField() == $field;
                    });
                    if ( !$exists) {
                        $desc = new \Librinfo\VarietiesBundle\Entity\VarietyDescription();
                        $desc->setFieldset($fieldset);
                        $desc->setField($field);
                        $subject->addVarietyDescription($desc);
                    }
                }

                // Sort VarietyDescriptions according to the configuration order
                $order = []; $i = 0;
                foreach ( $config as $fieldset => $fields )
                foreach ( $fields as $field => $settings )
                    $order[$fieldset][$field] = $i++;
                $iterator = $subject->getVarietyDescriptions()->getIterator();
                $iterator->uasort(function ($a, $b) use ($order) {
                    return ( $order[$a->getFieldset()][$a->getField()] < $order[$b->getFieldset()][$b->getField()] ) ? -1 : 1;
                });
                $subject->setVarietyDescriptions( new ArrayCollection(iterator_to_array($iterator)) );
            }
        );
    } // END configureFormFields()
}
