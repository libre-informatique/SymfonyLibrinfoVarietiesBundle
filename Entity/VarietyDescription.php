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
     * @var \Librinfo\VarietiesBundle\Entity\Strain
     */
    protected $strain;

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
    
    /**
     * Set strain
     *
     * @param \Librinfo\VarietiesBundle\Entity\Strain $strain
     *
     * @return StrainDescription
     */
    public function setStrain($strain = null)
    {
        $this->strain = $strain;

        return $this;
    }

    /**
     * Get strain
     *
     * @return \Librinfo\VarietiesBundle\Entity\Strain
     */
    public function getStrain()
    {
        return $this->strain;
    }
}

