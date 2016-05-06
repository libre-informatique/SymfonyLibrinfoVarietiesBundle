<?php

namespace Librinfo\VarietiesBundle\Entity;

/**
 * SuperVariety
 */
class SuperVariety
{
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
     * @var int
     */
    private $germination_rate;

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
    private $ditance_on_line;

    /**
     * @var int
     */
    private $ditance_between_lines;

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
     * Set latinName
     *
     * @param string $latinName
     *
     * @return SuperVariety
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
     * @return SuperVariety
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
     * @return SuperVariety
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
     * Set germinationRate
     *
     * @param int $germinationRate
     *
     * @return SuperVariety
     */
    public function setGerminationRate($germinationRate)
    {
        $this->germination_rate = $germinationRate;

        return $this;
    }

    /**
     * Get germinationRate
     *
     * @return int
     */
    public function getGerminationRate()
    {
        return $this->germination_rate;
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
     * Set ditanceOnLine
     *
     * @param int $ditanceOnLine
     *
     * @return SuperVariety
     */
    public function setDitanceOnLine($ditanceOnLine)
    {
        $this->ditance_on_line = $ditanceOnLine;

        return $this;
    }

    /**
     * Get ditanceOnLine
     *
     * @return int
     */
    public function getDitanceOnLine()
    {
        return $this->ditance_on_line;
    }

    /**
     * Set ditanceBetweenLines
     *
     * @param int $ditanceBetweenLines
     *
     * @return SuperVariety
     */
    public function setDitanceBetweenLines($ditanceBetweenLines)
    {
        $this->ditance_between_lines = $ditanceBetweenLines;

        return $this;
    }

    /**
     * Get ditanceBetweenLines
     *
     * @return int
     */
    public function getDitanceBetweenLines()
    {
        return $this->ditance_between_lines;
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
}

