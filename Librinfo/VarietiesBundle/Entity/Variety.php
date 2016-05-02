<?php

namespace Librinfo\VarietiesBundle\Entity;

/**
 * Variety
 */
class Variety
{
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $strains;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Species
     */
    private $species;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $plant_categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->strains = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plant_categories = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Add plantCategory
     *
     * @param \Librinfo\VarietiesBundle\Entity\PlantCategory $plantCategory
     *
     * @return Variety
     */
    public function addPlantCategory(\Librinfo\VarietiesBundle\Entity\PlantCategory $plantCategory)
    {
        $this->plant_categories[] = $plantCategory;

        return $this;
    }

    /**
     * Remove plantCategory
     *
     * @param \Librinfo\VarietiesBundle\Entity\PlantCategory $plantCategory
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePlantCategory(\Librinfo\VarietiesBundle\Entity\PlantCategory $plantCategory)
    {
        return $this->plant_categories->removeElement($plantCategory);
    }

    /**
     * Get plantCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlantCategories()
    {
        return $this->plant_categories;
    }
}

