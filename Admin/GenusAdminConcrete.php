<?php

namespace Librinfo\VarietiesBundle\Admin;

use Librinfo\CoreBundle\Admin\Traits\EmbeddedAdmin;
use Sonata\AdminBundle\Form\FormMapper;

class GenusAdminConcrete extends GenusAdmin
{
    use EmbeddedAdmin;

    /**
     * @param FormMapper $formMapper
     */
//    protected function configureFormFields(FormMapper $formMapper)
//    {
//        $this->configureFields(__FUNCTION__, $formMapper, $this->getGrandParentClass());
//
//        // if it is an embedded form...
//        if ($this->parentFieldDescription && $this->parentFieldDescription->getType() == 'sonata_type_collection') {
//            $formMapper->remove('createdAt');
//            $formMapper->remove('updatedAt');
//            $formMapper->remove('createdBy');
//            $formMapper->remove('updatedBy');
//            $formMapper->remove('family');
//            $formMapper->reorder(['name', 'alias', 'description']);
//        }
//    }


}