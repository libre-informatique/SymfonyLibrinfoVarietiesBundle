<?php

namespace Librinfo\VarietiesBundle\Entity;

/**
 * VarietyDescriptionAmateur
 */
class VarietyDescriptionAmateur extends VarietyDescription
{
    /**
     * @var \Librinfo\VarietiesBundle\Entity\Variety
     */
    private $variety;

    /**
     * Set variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return VarietyDescription
     */
    public function setVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety = null)
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
}

