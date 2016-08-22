<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;

/**
 * SuperVariety
 */
class SuperVariety
{
    use BaseEntity;

    /**
     * @var string
     */
    private $selection_advice;

    /**
     * @var string
     */
    private $selection_criteria;

    /**
     * @var float
     */
    private $tkw;

    /**
     * @var int
     */
    private $seed_lifespan;

    /**
     * @var int
     */
    private $raise_duration;

    /**
     * @var int
     */
    private $seedhead_yield;

    /**
     * @var int
     */
    private $distance_on_line;

    /**
     * @var int
     */
    private $distance_between_lines;

    /**
     * @var int
     */
    private $plant_density;

    /**
     * @var int
     */
    private $area_per_kg;

    /**
     * @var int
     */
    private $seedheads_per_kg;

    /**
     * @var int
     */
    private $base_seed_per_kg;

    /**
     * @var strin
     */
    private $transmitted_diseases;

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

    /**
     * Constructor
     */
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
     * Set tkw
     *
     * @param float $tkw
     *
     * @return SuperVariety
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
     * Set seedLifespan
     *
     * @param int $seedLifespan
     *
     * @return SuperVariety
     */
    public function setSeedLifespan($seedLifespan)
    {
        $this->seed_lifespan = $seedLifespan;

        return $this;
    }

    /**
     * Get seedLifespan
     *
     * @return int
     */
    public function getSeedLifespan()
    {
        return $this->seed_lifespan;
    }

    /**
     * Set raiseDuration
     *
     * @param int $raiseDuration
     *
     * @return SuperVariety
     */
    public function setRaiseDuration($raiseDuration)
    {
        $this->raise_duration = $raiseDuration;

        return $this;
    }

    /**
     * Get raiseDuration
     *
     * @return int
     */
    public function getRaiseDuration()
    {
        return $this->raise_duration;
    }

    /**
     * Set seedheadYield
     *
     * @param int $seedheadYield
     *
     * @return SuperVariety
     */
    public function setSeedheadYield($seedheadYield)
    {
        $this->seedhead_yield = $seedheadYield;

        return $this;
    }

    /**
     * Get seedheadYield
     *
     * @return int
     */
    public function getSeedheadYield()
    {
        return $this->seedhead_yield;
    }

    /**
     * Set distanceOnLine
     *
     * @param int $distanceOnLine
     *
     * @return SuperVariety
     */
    public function setDistanceOnLine($distanceOnLine)
    {
        $this->distance_on_line = $distanceOnLine;

        return $this;
    }

    /**
     * Get distanceOnLine
     *
     * @return int
     */
    public function getDistanceOnLine()
    {
        return $this->distance_on_line;
    }

    /**
     * Set distanceBetweenLines
     *
     * @param int $distanceBetweenLines
     *
     * @return SuperVariety
     */
    public function setDistanceBetweenLines($distanceBetweenLines)
    {
        $this->distance_between_lines = $distanceBetweenLines;

        return $this;
    }

    /**
     * Get distanceBetweenLines
     *
     * @return int
     */
    public function getDistanceBetweenLines()
    {
        return $this->distance_between_lines;
    }

    /**
     * Set plantDensity
     *
     * @param int $plantDensity
     *
     * @return SuperVariety
     */
    public function setPlantDensity($plantDensity)
    {
        $this->plant_density = $plantDensity;

        return $this;
    }

    /**
     * Get plantDensity
     *
     * @return int
     */
    public function getPlantDensity()
    {
        return $this->plant_density;
    }

    /**
     * Set areaPerKg
     *
     * @param int $areaPerKg
     *
     * @return SuperVariety
     */
    public function setAreaPerKg($areaPerKg)
    {
        $this->area_per_kg = $areaPerKg;

        return $this;
    }

    /**
     * Get areaPerKg
     *
     * @return int
     */
    public function getAreaPerKg()
    {
        return $this->area_per_kg;
    }

    /**
     * Set seedheadsPerKg
     *
     * @param int $seedheadsPerKg
     *
     * @return SuperVariety
     */
    public function setSeedheadsPerKg($seedheadsPerKg)
    {
        $this->seedheads_per_kg = $seedheadsPerKg;

        return $this;
    }

    /**
     * Get seedheadsPerKg
     *
     * @return int
     */
    public function getSeedheadsPerKg()
    {
        return $this->seedheads_per_kg;
    }

    /**
     * Set baseSeedPerKg
     *
     * @param int $baseSeedPerKg
     *
     * @return SuperVariety
     */
    public function setBaseSeedPerKg($baseSeedPerKg)
    {
        $this->base_seed_per_kg = $baseSeedPerKg;

        return $this;
    }

    /**
     * Get baseSeedPerKg
     *
     * @return int
     */
    public function getBaseSeedPerKg()
    {
        return $this->base_seed_per_kg;
    }

    /**
     * Set transmittedDiseases
     *
     * @param \strin $transmittedDiseases
     *
     * @return SuperVariety
     */
    public function setTransmittedDiseases( $transmittedDiseases)
    {
        $this->transmitted_diseases = $transmittedDiseases;

        return $this;
    }

    /**
     * Get transmittedDiseases
     *
     * @return \strin
     */
    public function getTransmittedDiseases()
    {
        return $this->transmitted_diseases;
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
}

