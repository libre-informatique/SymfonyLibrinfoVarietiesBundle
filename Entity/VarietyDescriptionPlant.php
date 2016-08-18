<?php

namespace Librinfo\VarietiesBundle\Entity;



/**
 * VarietyDescriptionPlant
 */
class VarietyDescriptionPlant extends VarietyDescription
{
    public function getFieldset() 
    {
        return 'plant';
    }
}

