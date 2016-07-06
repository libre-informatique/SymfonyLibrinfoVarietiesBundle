<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Symfony\Component\OptionsResolver\OptionsResolver;
use Librinfo\CoreBundle\Form\AbstractType as BaseAbstractType;

class CustomChoiceType extends BaseAbstractType
{
    public function getParent() {
        return 'choice';
    }

    public function getName() {
        return 'librinfo_custom_choice';
    }
    
    public function configureOptions(OptionsResolver $resolver) {
    }
}
