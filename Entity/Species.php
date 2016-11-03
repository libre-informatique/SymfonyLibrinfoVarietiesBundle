<?php

namespace Librinfo\VarietiesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;
use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\UserBundle\Entity\Traits\Traceable;
use Librinfo\DoctrineBundle\Entity\Traits\Descriptible;
use Librinfo\DoctrineBundle\Entity\Traits\Jsonable;

/**
 * Species
 */
class Species implements \JsonSerializable
{
    use BaseEntity,
        Nameable,
        Traceable,
        Descriptible,
        Jsonable
    ;

    /**
     * @var string
     */
    private $latin_name;

    /**
     * @var string
     */
    private $alias;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $life_cycle;
    
    /**
     * @var integer
     */
    private $legal_germination_rate;

    /**
     * @var integer
     */
    private $seed_lifespan;

    /**
     * @var integer
     */
    private $raise_duration;

    /**
     * @var float
     */
    private $tkw;


    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $varieties;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Genus
     */
    private $genus;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Species
     */
    private $parent_species;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subspecieses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $plant_categories;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->initCollections();
    }
    
    public function __clone()
    {
        $this->id = null;
        $this->initCollections();
    }
    
    public function initCollections()
    {
        $this->varieties = new ArrayCollection();
        $this->subspecieses = new ArrayCollection();
        $this->plant_categories = new ArrayCollection();
    }

    /**
     * Set latinName
     *
     * @param string $latinName
     *
     * @return Species
     */
    public function setLatinName($latinName)
    {
        $this->latin_name = $latinName;

        return $this;
    }

    /**
     * Get latinName
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->latin_name;
    }

    /**
     * Set alias
     *
     * @param string $alias
     *
     * @return Species
     */
    public function setAlias($alias)
    {
        $this->alias = $alias;

        return $this;
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->alias;
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return Species
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
     * Set lifeCycle
     *
     * @param string $lifeCycle
     *
     * @return Species
     */
    public function setLifeCycle($lifeCycle)
    {
        $this->life_cycle = $lifeCycle;

        return $this;
    }

    /**
     * Get lifeCycle
     *
     * @return string
     */
    public function getLifeCycle()
    {
        return $this->life_cycle;
    }
    
        /**
     * Set legal_germination_rate
     *
     * @param integer $legalGerminationRate
     * @return Species
     */
    public function setLegalGerminationRate($legalGerminationRate)
    {
        $this->legal_germination_rate = $legalGerminationRate;

        return $this;
    }

    /**
     * Get legal_germination_rate
     *
     * @return integer 
     */
    public function getLegalGerminationRate()
    {
        return $this->legal_germination_rate;
    }

    /**
     * Set seed_lifespan
     *
     * @param integer $seedLifespan
     * @return Species
     */
    public function setSeedLifespan($seedLifespan)
    {
        $this->seed_lifespan = $seedLifespan;

        return $this;
    }

    /**
     * Get seed_lifespan
     *
     * @return integer 
     */
    public function getSeedLifespan()
    {
        return $this->seed_lifespan;
    }

    /**
     * Set raise_duration
     *
     * @param integer $raiseDuration
     * @return Species
     */
    public function setRaiseDuration($raiseDuration)
    {
        $this->raise_duration = $raiseDuration;

        return $this;
    }

    /**
     * Get raise_duration
     *
     * @return integer 
     */
    public function getRaiseDuration()
    {
        return $this->raise_duration;
    }

    /**
     * Set tkw
     *
     * @param float $tkw
     * @return Species
     */
    public function setTkw($tkw)
    {
        $this->tkw = $tkw;

        return $this;
    }

    /**
     * Get tkw
     *
     * @return float 
     */
    public function getTkw()
    {
        return $this->tkw;
    }

    /**
     * Set genus
     *
     * @param \Librinfo\VarietiesBundle\Entity\Genus $genus
     *
     * @return Species
     */
    public function setGenus(\Librinfo\VarietiesBundle\Entity\Genus $genus = null)
    {
        $this->genus = $genus;

        return $this;
    }

    /**
     * Get genus
     *
     * @return \Librinfo\VarietiesBundle\Entity\Genus
     */
    public function getGenus()
    {
        return $this->genus;
    }

    /**
     * Add variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return Species
     */
    public function addVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety)
    {
        $variety->setSpecies($this);
        $this->varieties->add($variety);
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

    /**
     * Add subspecies
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $subspecies
     *
     * @return Species
     */
    public function addSubspecies(\Librinfo\VarietiesBundle\Entity\Species $subspecies)
    {
        $subspecies->setParentSpecies($this);
        $this->subspecieses[] = $subspecies;
        return $this;
    }

    /**
     * Remove subspecies
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $subspecies
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSubspeciese(\Librinfo\VarietiesBundle\Entity\Species $subspecies)
    {
        return $this->subspecieses->removeElement($subspecies);
    }

    /**
     * Get subspecieses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSubspecieses()
    {
        return $this->subspecieses;
    }

    /**
     * Has sub-specieses
     *
     * @return boolean
     */
    public function hasSubspecieses()
    {
        return count($this->subspecieses) > 0;
    }


    /**
     * Set parentSpecies
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $parentSpecies
     *
     * @return Species
     */
    public function setParentSpecies(\Librinfo\VarietiesBundle\Entity\Species $parentSpecies = null)
    {
        $this->parent_species = $parentSpecies;

        return $this;
    }

    /**
     * Get parentSpecies
     *
     * @return \Librinfo\VarietiesBundle\Entity\Species
     */
    public function getParentSpecies()
    {
        return $this->parent_species;
    }

    /**
     * Has parent species
     *
     * @return boolean
     */
    public function hasParentSpecies()
    {
        return $this->parent_species != null;
    }

    /**
     * Check if a species has a grand parent
     * This should never happen (used for validation methods)
     *
     * @return boolean
     */
    public function hasGrandParentSpecies()
    {
        return $this->parent_species != null && $this->parent_species->getParentSpecies() != null;
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

    /**
     * Set plantCategories
     *
     */
    public function setPlantCategories($plant_categories)
    {
        $this->plant_categories = $plant_categories;
    }
}

