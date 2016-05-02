<?php

namespace Librinfo\VarietiesBundle\Entity;

/**
 * PlantCategory
 */
class PlantCategory
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $varieties;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->varieties = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return PlantCategory
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Add variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return PlantCategory
     */
    public function addVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety)
    {
        $this->varieties[] = $variety;

        return $this;
    }

    /**
     * Remove variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety)
    {
        return $this->varieties->removeElement($variety);
    }

    /**
     * Get varieties
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVarieties()
    {
        return $this->varieties;
    }
}

