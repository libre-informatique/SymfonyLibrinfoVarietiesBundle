<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Blast\CoreBundle\Form\AbstractType as BaseAbstractType;
use Librinfo\VarietiesBundle\Entity\LifeCycle;

class LifeCycleType extends BaseAbstractType
{
    public function getParent() {
        return 'choice';
    }

    public function configureOptions(OptionsResolver $resolver) {
        $choices = [];
        foreach ( LifeCycle::values() as $lifecycle )
            $choices['librinfo.label.life_cycle_' . $lifecycle] = $lifecycle;
        $resolver->setDefaults([
            'multiple' => false,
            'expanded' => false,
            'choices' => $choices
        ]);
    }
}
