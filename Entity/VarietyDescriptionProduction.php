<?php

namespace Librinfo\VarietiesBundle\Entity;



/**
 * VarietyDescriptionProduction
 */
class VarietyDescriptionProduction extends VarietyDescription
{
    public function getFieldset() 
    {
        return 'production';
    }
}

