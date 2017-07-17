<?php

/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Blast\CoreBundle\Form\AbstractType as BaseAbstractType;
use Librinfo\VarietiesBundle\Entity\LifeCycle;

class LifeCycleType extends BaseAbstractType
{
    public function getParent()
    {
        return 'choice';
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $choices = [];
        foreach (LifeCycle::values() as $lifecycle) {
            $choices['librinfo.label.life_cycle_' . $lifecycle] = $lifecycle;
        }
        $resolver->setDefaults([
            'multiple' => false,
            'expanded' => false,
            'choices' => $choices,
        ]);
    }
}
