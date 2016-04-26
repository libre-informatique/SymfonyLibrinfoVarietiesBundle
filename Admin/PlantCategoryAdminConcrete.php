<?php

namespace Librinfo\VarietiesBundle\Admin;

use Librinfo\CoreBundle\Admin\Traits\Base as BaseAdmin;

class PlantCategoryAdminConcrete extends PlantCategoryAdmin
{
    use BaseAdmin;

    protected $datagridValues = array(
        '_page'       => 1,
        '_sort_order' => 'ASC',
        '_sort_by'    => 'sortMaterializedPath',
    );

    public function preValidate($object) {
        if ( $object->getParentNode() === null ) {
            $repo = $this->modelManager->getEntityManager($object)->getRepository(get_class($object));
            $root = $repo->getOrCreateRootNode();
            $object->setParentNode($root);
        }

        parent::preValidate($object);
    }
}