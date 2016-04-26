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
    private $specieses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->specieses = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Add speciese
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $speciese
     *
     * @return PlantCategory
     */
    public function addSpeciese(\Librinfo\VarietiesBundle\Entity\Species $speciese)
    {
        $this->specieses[] = $speciese;

        return $this;
    }

    /**
     * Remove speciese
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $speciese
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSpeciese(\Librinfo\VarietiesBundle\Entity\Species $speciese)
    {
        return $this->specieses->removeElement($speciese);
    }

    /**
     * Get specieses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSpecieses()
    {
        return $this->specieses;
    }
}

