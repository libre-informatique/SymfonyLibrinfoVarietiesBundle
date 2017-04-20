<?php

namespace Librinfo\VarietiesBundle\Entity;

/**
 * VarietyDescription
 */
class VarietyDescription extends GenericDescription
{

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Variety
     */
    protected $variety;

    /**
     * Set variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return VarietyDescription
     */
    public function setVariety($variety = null)
    {
        $this->variety = $variety;

        return $this;
    }

    /**
     * Get variety
     *
     * @return \Librinfo\VarietiesBundle\Entity\Variety
     */
    public function getVariety()
    {
        return $this->variety;
    }
    
    public function __clone()
    {
        $this->id = null;
        $this->setVariety(null);
    }
    
}
