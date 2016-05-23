<?php

namespace Librinfo\VarietiesBundle\Admin;
use Symfony\Component\Form\FormEvents;
use Doctrine\ORM\Mapping\ClassMetadataInfo;
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
        // FROM EmbeddedAdmin::HandlesRelationsAdmin :

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

dump($this->getConfigurationPool()->getContainer()->getParameter('librinfo_varieties'));

        $admin = $this;
        $formMapper->getFormBuilder()->addEventListener(FormEvents::PRE_SET_DATA,
            function ($event) use ($formMapper, $admin) {
                $form = $event->getForm();
                $subject = $admin->getSubject($event->getData());

                $descriptions = $subject->getVarietyDescriptions()->filter(function($d){
                    return $d->getFieldset() == 'grouptest' && $d->getField() == 'fieldtest';
                });
                if ( $descriptions->count() == 0 ) {
                    $desc = new \Librinfo\VarietiesBundle\Entity\VarietyDescription();
                    $desc->setFieldset('grouptest');
                    $desc->setField('fieldtest');
                    $subject->addVarietyDescription($desc);
                }
        });
    }
}
