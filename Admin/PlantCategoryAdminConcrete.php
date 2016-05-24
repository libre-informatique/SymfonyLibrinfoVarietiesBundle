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

    public function createQuery($context = 'list') {
        $query = parent::createQuery($context);
        $query->andWhere($query->getRootAliases()[0] . '.name != :root_name');
        $query->setParameter('root_name', '_ROOT_');
        return $query;
    }

    /**
     * Create a query builder that fetches all the plant categories without the root element
     *
     * @param PlantCategoryRepository $repo
     * @return QueryBuilder
     */
    public static function getAllWithoutRootQB($repo)
    {
        return $repo->getAllWithoutRootQB();
    }
}