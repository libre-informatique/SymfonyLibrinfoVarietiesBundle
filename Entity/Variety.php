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
     * @var string
     */
    private $life_cycle;

    /**
     * @var bool
     */
    private $official;

    /**
     * @var string
     */
    private $official_name;

    /**
     * @var \DateTime
     */
    private $official_date_in;

    /**
     * @var \DateTime
     */
    private $official_date_out;

    /**
     * @var string
     */
    private $official_maintainer;

    /**
     * @var int
     */
    private $legal_germination_rate;

    /**
     * @var string
     */
    private $regulatory_status;
    
     /**
     * @var String
     */
    private $selection_advice;
    
    /**
     * @var String
     */
    private $selection_criteria;
    
    /**
     * @var string
     */
    private $strain_characteristics;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $strains;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $professional_descriptions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $amateur_descriptions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $inner_descriptions;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $production_descriptions;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $commercial_descriptions;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $plant_descriptions;
    
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $culture_descriptions;

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
        $this->professional_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->amateur_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inner_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->production_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commercial_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plant_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->culture_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

//    public function __get($name)
//    {
//        if (property_exists($this, $name)) {
//          return $this->$name;
//        }
//
//        if ( strpos($name, 'description_') === 0 )
//        {
//            $parts = explode('_', $name);
//            if ( count($parts) == 3 )
//                return $this->getGenericDescription($parts[1], $parts[2]);
//        }
//
//
//        trigger_error(
//            'Undefined property via __get(): ' . $name .
//            ' in ' . $trace[0]['file'] .
//            ' on line ' . $trace[0]['line'],
//            E_USER_NOTICE);
//        return null;
//    }

   /**
     * Set lifeCycle
     *
     * @param string $lifeCycle
     *
     * @return SuperVariety
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
     * Set strainCharacteristics
     *
     * @param string $strainCharacteristics
     *
     * @return Variety
     */
    public function setStrainCharacteristics($strainCharacteristics)
    {
        $this->strain_characteristics = $strainCharacteristics;

        return $this;
    }

    /**
     * Get strainCharacteristics
     *
     * @return string
     */
    public function getStrainCharacteristics()
    {
        return $this->strain_characteristics;
    }

    /**
     * Set official
     *
     * @param bool $official
     *
     * @return SuperVariety
     */
    public function setOfficial($official)
    {
        $this->official = $official;

        return $this;
    }

    /**
     * Get official
     *
     * @return bool
     */
    public function getOfficial()
    {
        return $this->official;
    }

    /**
     * Set officialName
     *
     * @param string $officialName
     *
     * @return SuperVariety
     */
    public function setOfficialName($officialName)
    {
        $this->official_name = $officialName;

        return $this;
    }

    /**
     * Get officialName
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->official_name;
    }

    /**
     * Set officialDateIn
     *
     * @param \DateTime $officialDateIn
     *
     * @return SuperVariety
     */
    public function setOfficialDateIn($officialDateIn)
    {
        $this->official_date_in = $officialDateIn;

        return $this;
    }

    /**
     * Get officialDateIn
     *
     * @return \DateTime
     */
    public function getOfficialDateIn()
    {
        return $this->official_date_in;
    }

    /**
     * Set officialDateOut
     *
     * @param \DateTime $officialDateOut
     *
     * @return SuperVariety
     */
    public function setOfficialDateOut($officialDateOut)
    {
        $this->official_date_out = $officialDateOut;

        return $this;
    }

    /**
     * Get officialDateOut
     *
     * @return \DateTime
     */
    public function getOfficialDateOut()
    {
        return $this->official_date_out;
    }

    /**
     * Set officialMaintainer
     *
     * @param string $officialMaintainer
     *
     * @return SuperVariety
     */
    public function setOfficialMaintainer($officialMaintainer)
    {
        $this->official_maintainer = $officialMaintainer;

        return $this;
    }

    /**
     * Get officialMaintainer
     *
     * @return string
     */
    public function getOfficialMaintainer()
    {
        return $this->official_maintainer;
    }

    /**
     * Set legalGerminationRate
     *
     * @param int $legalGerminationRate
     *
     * @return SuperVariety
     */
    public function setLegalGerminationRate($legalGerminationRate)
    {
        $this->legal_germination_rate = $legalGerminationRate;

        return $this;
    }

    /**
     * Get legalGerminationRate
     *
     * @return int
     */
    public function getLegalGerminationRate()
    {
        return $this->legal_germination_rate;
    }
    
    /**
     * Set regulatoryStatus
     *
     * @param string $regulatoryStatus
     *
     * @return Variety
     */
    public function setRegulatoryStatus($regulatoryStatus)
    {
        $this->regulatory_status = $regulatoryStatus;

        return $this;
    }

    /**
     * Get regulatoryStatus
     *
     * @return string
     */
    public function getRegulatoryStatus()
    {
        return $this->regulatory_status;
    }
    
     /**
     * Set selectionAdvice
     *
     * @param string $selectionAdvice
     *
     * @return SuperVariety
     */
    public function setSelectionAdvice($selectionAdvice)
    {
        $this->selection_advice = $selectionAdvice;

        return $this;
    }

    /**
     * Get selectionAdvice
     *
     * @return string
     */
    public function getSelectionAdvice()
    {
        return $this->selection_advice;
    }

    /**
     * Set selectionCriteria
     *
     * @param string $selectionCriteria
     *
     * @return SuperVariety
     */
    public function setSelectionCriteria($selectionCriteria)
    {
        $this->selection_criteria = $selectionCriteria;

        return $this;
    }

    /**
     * Get selectionCriteria
     *
     * @return string
     */
    public function getSelectionCriteria()
    {
        return $this->selection_criteria;
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
        $strain->setVariety($this);
        $this->strains->add($strain);
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
     * Add professionalDescription
     *
     * @param VarietyDescriptionProfessional $description
     *
     * @return Variety
     */
    public function addProfessionalDescription(VarietyDescriptionProfessional $description)
    {
        $description->setVariety($this);
        $this->professional_descriptions->add($description);
        return $this;
    }

    /**
     * Remove professionalDescription
     *
     * @param VarietyDescriptionProfessional $professionalDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProfessionalDescription(VarietyDescriptionProfessional $professionalDescription)
    {
        return $this->professional_descriptions->removeElement($professionalDescription);
    }

    /**
     * Get professionalDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfessionalDescriptions()
    {
        return $this->professional_descriptions;
    }

    /**
     * alias for getProfessionalDescriptions()
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProfessional_descriptions()
    {
        return $this->getProfessionalDescriptions();
    }

    /**
     * Set professional descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setProfessionalDescriptions($descriptions)
    {
        foreach($descriptions as $description)
            $description->setVariety($this);
        $this->professional_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add productionDescription
     *
     * @param VarietyDescriptionProduction $description
     *
     * @return Variety
     */
    public function addProductionDescription(VarietyDescriptionProduction $description)
    {
        $description->setVariety($this);
        $this->production_descriptions->add($description);
        return $this;
    }

    /**
     * Remove productionDescription
     *
     * @param VarietyDescriptionProduction $productionDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProductionDescription(VarietyDescriptionProduction $productionDescription)
    {
        return $this->production_descriptions->removeElement($productionDescription);
    }

    /**
     * Get productionDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProductionDescriptions()
    {
        return $this->production_descriptions;
    }

    /**
     * alias for getProductionDescriptions()
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getProduction_descriptions()
    {
        return $this->getProductionDescriptions();
    }

    /**
     * Set production descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setProductionDescriptions($descriptions)
    {
        foreach($descriptions as $description)
            $description->setVariety($this);
        $this->production_descriptions = $descriptions;
        return $this;
    }
    
    /**
     * Add commercialDescription
     *
     * @param VarietyDescriptionCommercial $description
     *
     * @return Variety
     */
    public function addCommercialDescription(VarietyDescriptionCommercial $description)
    {
        $description->setVariety($this);
        $this->commercial_descriptions->add($description);
        return $this;
    }

    /**
     * Remove commercialDescription
     *
     * @param VarietyDescriptionCommercial $commercialDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommercialDescription(VarietyDescriptionCommercial $commercialDescription)
    {
        return $this->commercial_descriptions->removeElement($commercialDescription);
    }

    /**
     * Get commercialDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommercialDescriptions()
    {
        return $this->commercial_descriptions;
    }

    /**
     * alias for getCommercialDescriptions()
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommercial_descriptions()
    {
        return $this->getCommercialDescriptions();
    }

    /**
     * Set commercial descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setCommercialDescriptions($descriptions)
    {
        foreach($descriptions as $description)
            $description->setVariety($this);
        $this->commercial_descriptions = $descriptions;
        return $this;
    }
    
    /**
     * Add plantDescription
     *
     * @param VarietyDescriptionPlant $description
     *
     * @return Variety
     */
    public function addPlantDescription(VarietyDescriptionPlant $description)
    {
        $description->setVariety($this);
        $this->plant_descriptions->add($description);
        return $this;
    }

    /**
     * Remove plantDescription
     *
     * @param VarietyDescriptionPlant $plantDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePlantDescription(VarietyDescriptionPlant $plantDescription)
    {
        return $this->plant_descriptions->removeElement($plantDescription);
    }

    /**
     * Get plantDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlantDescriptions()
    {
        return $this->plant_descriptions;
    }

    /**
     * alias for getPlantDescriptions()
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlant_descriptions()
    {
        return $this->getPlantDescriptions();
    }

    /**
     * Set plant descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setPlantDescriptions($descriptions)
    {
        foreach($descriptions as $description)
            $description->setVariety($this);
        $this->plant_descriptions = $descriptions;
        return $this;
    }
    
    /**
     * Add cultureDescription
     *
     * @param VarietyDescriptionCulture $description
     *
     * @return Variety
     */
    public function addCultureDescription(VarietyDescriptionCulture $description)
    {
        $description->setVariety($this);
        $this->culture_descriptions->add($description);
        return $this;
    }

    /**
     * Remove cultureDescription
     *
     * @param VarietyDescriptionCulture $cultureDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCultureDescription(VarietyDescriptionCulture $cultureDescription)
    {
        return $this->culture_descriptions->removeElement($cultureDescription);
    }

    /**
     * Get cultureDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCultureDescriptions()
    {
        return $this->culture_descriptions;
    }

    /**
     * alias for getCultureDescriptions()
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCulture_descriptions()
    {
        return $this->getCultureDescriptions();
    }

    /**
     * Set culture descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setCultureDescriptions($descriptions)
    {
        foreach($descriptions as $description)
            $description->setVariety($this);
        $this->culture_descriptions = $descriptions;
        return $this;
    }
    
    /**
     * Add amateurDescription
     *
     * @param VarietyDescriptionAmateur $description
     *
     * @return Variety
     */
    public function addAmateurDescription(VarietyDescriptionAmateur $description)
    {
        $description->setVariety($this);
        $this->amateur_descriptions->add($description);
        return $this;
    }

    /**
     * Remove amateurDescription
     *
     * @param VarietyDescriptionAmateur $amateurDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAmateurDescription(VarietyDescriptionAmateur $amateurDescription)
    {
        return $this->amateur_descriptions->removeElement($amateurDescription);
    }

    /**
     * Get amateurDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmateurDescriptions()
    {
        return $this->amateur_descriptions;
    }
    
     /**
     * Get amateurDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAmateur_descriptions()
    {
        return $this->amateur_descriptions;
    }

    /**
     * Set amateur descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setAmateurDescriptions($descriptions)
    {
        $this->amateur_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add innerDescription
     *
     * @param VarietyDescriptionInner $description
     *
     * @return Variety
     */
    public function addInnerDescription(VarietyDescriptionInner $description)
    {
        $description->setVariety($this);
        $this->inner_descriptions->add($description);
        return $this;
    }

    /**
     * Remove innerDescription
     *
     * @param VarietyDescriptionInner $innerDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeInnerDescription(VarietyDescriptionInner $innerDescription)
    {
        return $this->inner_descriptions->removeElement($innerDescription);
    }

    /**
     * Get innerDescriptions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getInnerDescriptions()
    {
        return $this->inner_descriptions;
    }

    /**
     * Set inner descriptions
     * @param \Doctrine\Common\Collections\Collection $descriptions
     * @return Variety
     */
    public function setInnerDescriptions($descriptions)
    {
        $this->inner_descriptions = $descriptions;
        return $this;
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
     *
     * @param string $fieldset
     * @param string $field
     * @return \Librinfo\VarietiesBundle\Entity\VarietyDescription
     */
//    public function getGenericDescription($fieldset, $field)
//    {
//        foreach ( $this->getVarietyDescriptions() as $description )
//        if ( $description->getFieldset() == $fieldset && $description->getField() == $field )
//            return $description;
//
//        $description = new VarietyDescription();
//        $description->setFieldset($fieldset);
//        $description->setField($field);
//        $this->addVarietyDescription($description);
//        return $description;
//    }

}

