<?php

namespace Librinfo\VarietiesBundle\Entity;

/**
 * VarietyDescriptionAmateur
 */
class VarietyDescriptionAmateur extends VarietyDescription
{
    public function getFieldset() 
    {
        return 'amateur';
    }
}

