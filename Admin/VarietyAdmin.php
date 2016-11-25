<?php

namespace Librinfo\VarietiesBundle\Admin;

use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Blast\CoreBundle\Admin\CoreAdmin;

class VarietyAdmin extends CoreAdmin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('latin_name')
            ->add('alias')
            ->add('code')
            ->add('life_cycle')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('official_maintainer')
            ->add('legal_germination_rate')
            ->add('regulatory_status')
            ->add('germination_rate')
            ->add('selection_advice')
            ->add('selection_criteria')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('seedhead_yield')
            ->add('distance_on_line')
            ->add('distance_between_lines')
            ->add('plant_density')
            ->add('area_per_kg')
            ->add('seedheads_per_kg')
            ->add('base_seed_per_kg')
            ->add('transmitted_diseases')
            ->add('strain_characteristics')
            ->add('isStrain')
            ->add('name')
            ->add('description')
            ->add('id')
            ->add('createdAt')
            ->add('updatedAt')
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
            ->add('life_cycle')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('official_maintainer')
            ->add('legal_germination_rate')
            ->add('regulatory_status')
            ->add('germination_rate')
            ->add('selection_advice')
            ->add('selection_criteria')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('seedhead_yield')
            ->add('distance_on_line')
            ->add('distance_between_lines')
            ->add('plant_density')
            ->add('area_per_kg')
            ->add('seedheads_per_kg')
            ->add('base_seed_per_kg')
            ->add('transmitted_diseases')
            ->add('strain_characteristics')
            ->add('isStrain')
            ->add('name')
            ->add('description')
            ->add('id')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', null, array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                    'duplicate' => array(
                        'template' => 'BlastCoreBundle:CRUD:list__action_duplicate.html.twig'
                    )
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
            ->add('life_cycle')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('official_maintainer')
            ->add('legal_germination_rate')
            ->add('regulatory_status')
            ->add('germination_rate')
            ->add('selection_advice')
            ->add('selection_criteria')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('seedhead_yield')
            ->add('distance_on_line')
            ->add('distance_between_lines')
            ->add('plant_density')
            ->add('area_per_kg')
            ->add('seedheads_per_kg')
            ->add('base_seed_per_kg')
            ->add('transmitted_diseases')
            ->add('strain_characteristics')
            ->add('isStrain')
            ->add('name')
            ->add('description')
            ->add('id')
            ->add('createdAt')
            ->add('updatedAt')
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
            ->add('life_cycle')
            ->add('official')
            ->add('official_name')
            ->add('official_date_in')
            ->add('official_date_out')
            ->add('official_maintainer')
            ->add('legal_germination_rate')
            ->add('regulatory_status')
            ->add('germination_rate')
            ->add('selection_advice')
            ->add('selection_criteria')
            ->add('tkw')
            ->add('seed_lifespan')
            ->add('raise_duration')
            ->add('seedhead_yield')
            ->add('distance_on_line')
            ->add('distance_between_lines')
            ->add('plant_density')
            ->add('area_per_kg')
            ->add('seedheads_per_kg')
            ->add('base_seed_per_kg')
            ->add('transmitted_diseases')
            ->add('strain_characteristics')
            ->add('isStrain')
            ->add('name')
            ->add('description')
            ->add('id')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
