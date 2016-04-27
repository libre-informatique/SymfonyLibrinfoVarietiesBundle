<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\UserBundle\Entity\Traits\Traceable;
use Librinfo\DoctrineBundle\Entity\Traits\Descriptible;

/**
 * Variety
 */
class Variety extends SuperVariety
{
    use Nameable,
        Traceable,
        Descriptible;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $strains;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Species
     */
    private $species;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->strains = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add strain
     *
     * @param \Librinfo\VarietiesBundle\Entity\Strain $strain
     *
     * @return Variety
     */
    public function addStrain(\Librinfo\VarietiesBundle\Entity\Strain $strain)
    {
        $this->strains[] = $strain;

        return $this;
    }

    /**
     * Remove strain
     *
     * @param \Librinfo\VarietiesBundle\Entity\Strain $strain
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeStrain(\Librinfo\VarietiesBundle\Entity\Strain $strain)
    {
        return $this->strains->removeElement($strain);
    }

    /**
     * Get strains
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getStrains()
    {
        return $this->strains;
    }

    /**
     * Set species
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $species
     *
     * @return Variety
     */
    public function setSpecies(\Librinfo\VarietiesBundle\Entity\Species $species = null)
    {
        $this->species = $species;

        return $this;
    }

    /**
     * Get species
     *
     * @return \Librinfo\VarietiesBundle\Entity\Species
     */
    public function getSpecies()
    {
        return $this->species;
    }

    public function getSpeciesName()
    {
        return $this->species->getName();
    }
}

