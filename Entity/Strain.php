<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\UserBundle\Entity\Traits\Traceable;
use Librinfo\DoctrineBundle\Entity\Traits\Descriptible;

/**
 * Strain
 */
class Strain extends SuperVariety
{

    use Nameable,
        Traceable,
        Descriptible;

    /**
     * @var string
     */
    private $strain_characteristics;

    /**
     * @var \Librinfo\VarietiesBundle\Entity\Variety
     */
    private $variety;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $inner_descriptions;
    
    public function __construct()
    {
        $this->professional_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->amateur_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->production_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->commercial_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->plant_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->culture_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->inner_descriptions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get latinName
     *
     * @return string
     */
    public function getLatinName()
    {
        return $this->getVariety()->getLatinName();
    }

    /**
     * Get alias
     *
     * @return string
     */
    public function getAlias()
    {
        return $this->getVariety()->getAlias();
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->getVariety()->getCode();
    }

    /**
     * Get lifeCycle
     *
     * @return string
     */
    public function getLifeCycle()
    {
        return $this->getVariety()->getLifeCycle();
    }

    /**
     * Get official
     *
     * @return bool
     */
    public function getOfficial()
    {
        return $this->getVariety()->getOfficial();
    }

    /**
     * Get officialName
     *
     * @return string
     */
    public function getOfficialName()
    {
        return $this->getVariety()->getOfficialName();
    }

    /**
     * Get officialDateIn
     *
     * @return \DateTime
     */
    public function getOfficialDateIn()
    {
        return $this->getVariety()->getOfficialDateIn();
    }

    /**
     * Get officialDateOut
     *
     * @return \DateTime
     */
    public function getOfficialDateOut()
    {
        return $this->getVariety()->getOfficialDateOut();
    }

    /**
     * Get officialMaintainer
     *
     * @return string
     */
    public function getOfficialMaintainer()
    {
        return $this->getVariety()->getOfficialMaintainer();

    }

    /**
     * Get legalGerminationRate
     *
     * @return int
     */
    public function getLegalGerminationRate()
    {
        return $this->getVariety()->getLegalGerminationRate();
    }

    /**
     * Get regulatoryStatus
     *
     * @return string
     */
    public function getRegulatoryStatus()
    {
        return $this->getVariety()->getRegulatoryStatus();
    }

    /**
     * Get germinationRate
     *
     * @return int
     */
    public function getGerminationRate()
    {
        return $this->getVariety()->getGerminationRate();
    }
    
    /**
     * Get species
     *
     * @return \Librinfo\VarietiesBundle\Entity\Species
     */
    public function getSpecies()
    {
        return $this->getVariety()->getSpecies();
    }
    
    /**
     * Get plantCategories
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPlantCategories()
    {
        return $this->getVariety()->getPlantCategories();
    }

    /**
     * Set strainCharacteristics
     *
     * @param string $strainCharacteristics
     *
     * @return Strain
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
     * Set variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return Strain
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

    /**
     * Add professionalDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionProfessional $professionalDescription
     *
     * @return SuperVariety
     */
    public function addProfessionalDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionProfessional $professionalDescription)
    {
        $this->professional_descriptions[] = $professionalDescription;

        return $this;
    }

    /**
     * Remove professionalDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionProfessional $professionalDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProfessionalDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionProfessional $professionalDescription)
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
        foreach ($descriptions as $description)
            $description->setStrain($this);
        $this->professional_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add amateurDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionAmateur $amateurDescription
     *
     * @return SuperVariety
     */
    public function addAmateurDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionAmateur $amateurDescription)
    {
        $this->amateur_descriptions[] = $amateurDescription;

        return $this;
    }

    /**
     * Remove amateurDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionAmateur $amateurDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeAmateurDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionAmateur $amateurDescription)
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
     * Add productionDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionProduction $productionDescription
     *
     * @return SuperVariety
     */
    public function addProductionDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionProduction $productionDescription)
    {
        $this->production_descriptions[] = $productionDescription;

        return $this;
    }

    /**
     * Remove productionDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionProduction $productionDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeProductionDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionProduction $productionDescription)
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
        foreach ($descriptions as $description)
            $description->setStrain($this);
        $this->production_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add commercialDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionCommercial $commercialDescription
     *
     * @return SuperVariety
     */
    public function addCommercialDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionCommercial $commercialDescription)
    {
        $this->commercial_descriptions[] = $commercialDescription;

        return $this;
    }

    /**
     * Remove commercialDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionCommercial $commercialDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCommercialDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionCommercial $commercialDescription)
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
        foreach ($descriptions as $description)
            $description->setStrain($this);
        $this->commercial_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add plantDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionPlant $plantDescription
     *
     * @return SuperVariety
     */
    public function addPlantDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionPlant $plantDescription)
    {
        $this->plant_descriptions[] = $plantDescription;

        return $this;
    }

    /**
     * Remove plantDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionPlant $plantDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removePlantDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionPlant $plantDescription)
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
        foreach ($descriptions as $description)
            $description->setStrain($this);
        $this->plant_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add cultureDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionCulture $cultureDescription
     *
     * @return SuperVariety
     */
    public function addCultureDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionCulture $cultureDescription)
    {
        $this->culture_descriptions[] = $cultureDescription;

        return $this;
    }

    /**
     * Remove cultureDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionCulture $cultureDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeCultureDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionCulture $cultureDescription)
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
        foreach ($descriptions as $description)
            $description->setStrain($this);
        $this->culture_descriptions = $descriptions;
        return $this;
    }

    /**
     * Add innerDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionInner $innerDescription
     *
     * @return SuperVariety
     */
    public function addInnerDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionInner $innerDescription)
    {
        $this->inner_descriptions[] = $innerDescription;

        return $this;
    }

    /**
     * Remove innerDescription
     *
     * @param \Librinfo\VarietiesBundle\Entity\VarietyDescriptionInner $innerDescription
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeInnerDescription(\Librinfo\VarietiesBundle\Entity\VarietyDescriptionInner $innerDescription)
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
}
