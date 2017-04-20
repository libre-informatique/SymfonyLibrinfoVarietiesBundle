<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\Options;
use Doctrine\ORM\EntityManager;
use Blast\CoreBundle\Form\AbstractType as BaseAbstractType;
use Librinfo\VarietiesBundle\Form\ChoiceLoader\VarietyDescriptionChoiceLoader;

class VarietyDescriptionType extends BaseAbstractType
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

    public function getParent()
    {
        return 'choice';
    }

    public function getBlockPrefix()
    {
        return 'librinfo_variety_description';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $manager = $this->manager;

        $choiceLoader = function (Options $options) use ($manager) {
            return new VarietyDescriptionChoiceLoader($manager, $options);
        };

        $resolver->setDefaults([
            'placeholder' => '',
            'choice_loader' => $choiceLoader
        ]);
        
        $resolver->setDefined('fieldset');
        $resolver->setDefined('field');
    }
}
