<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Librinfo\CoreBundle\Form\AbstractType as BaseAbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Librinfo\VarietiesBundle\Form\Type\EmptyChoiceList;

class CustomChoiceType extends BaseAbstractType
{

    public function getParent()
    {
        return 'choice';
    }

    public function getName()
    {
        return 'librinfo_custom_choice';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        //prevents validation errors on choice type dynamically added choices
        $resolver->setDefaults(array(
            'choice_list' => new EmptyChoiceList(),
            'validation_groups' => false,
        ));
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    }
}
