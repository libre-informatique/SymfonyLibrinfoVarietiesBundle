<?php

namespace Librinfo\VarietiesBundle\Admin;

use Librinfo\CoreBundle\Admin\CoreAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Sonata\AdminBundle\Route\RouteCollection;

class VarietyAdmin extends CoreAdmin
{
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);
        $collection->add('getFilterWidget', 'getFilterWidget/{fieldset}/{field}');
    }
    
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('latin_name')
            ->add('alias')
            ->add('code')
            ->add('strain')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('maintainer')
            ->add('legal_germination_rate')
            ->add('germination_rate')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('description')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('name')
            ->add('id')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('latin_name')
            ->add('alias')
            ->add('code')
            ->add('strain')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('maintainer')
            ->add('legal_germination_rate')
            ->add('germination_rate')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('description')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('name')
            ->add('id')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('latin_name')
            ->add('alias')
            ->add('code')
            ->add('strain')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('maintainer')
            ->add('legal_germination_rate')
            ->add('germination_rate')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('description')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('name')
            ->add('id')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('latin_name')
            ->add('alias')
            ->add('code')
            ->add('strain')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('maintainer')
            ->add('legal_germination_rate')
            ->add('germination_rate')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('description')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('name')
            ->add('id')
        ;
    }
}
