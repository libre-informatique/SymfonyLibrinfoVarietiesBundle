<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormBuilderInterface;
use Doctrine\ORM\EntityManager;
use Blast\CoreBundle\Form\AbstractType as BaseAbstractType;

class VarietyDescriptionFilterType extends BaseAbstractType
{

    /** @var EntityManager */
    private $manager;

    /**
     * @param EntityManager $manager
     */
    public function __construct(EntityManager $manager)
    {
        $this->manager = $manager;
    }

    /**
     * {@inheritDoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $fieldSet = explode('_', $options['fieldset'])[0];
        
        $librinfoOptions = array(
            'fieldset' => $fieldSet,
            'required' => false
        );
        
        $builder->add('Field', 'librinfo_variety_description', array_merge($librinfoOptions, $options['field_options']));
        $builder->add('Value', 'text', array_merge(array('required' => false), $options['field_options']));
    }

    /**
     * {@inheritDoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'placeholder' => '',
            'field_options' => array(),
        ]);
        
        $resolver->setDefined('fieldset');
        $resolver->setDefined('field_type');

    }

    public function getBlockPrefix()
    {
        return 'librinfo_variety_description_filter';
    }

}
