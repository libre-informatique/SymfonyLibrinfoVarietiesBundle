<?php

namespace Librinfo\VarietiesBundle\Form\Type;

use Librinfo\CoreBundle\Form\AbstractType as BaseAbstractType;

class VarietyCodeType extends BaseAbstractType
{
    public function getParent() {
        return 'text';
    }
    
    public function getBlockPrefix()
    {
        return 'librinfo_varietycode';
    }
}
