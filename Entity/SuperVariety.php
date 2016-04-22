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
    private $maintainer;

    /**
     * @var int
     */
    private $legal_germination_rate;

    /**
     * @var int
     */
    private $germination_rate;

    /**
     * @var int
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
     * Set maintainer
     *
     * @param string $maintainer
     *
     * @return SuperVariety
     */
    public function setMaintainer($maintainer)
    {
        $this->maintainer = $maintainer;

        return $this;
    }

    /**
     * Get maintainer
     *
     * @return string
     */
    public function getMaintainer()
    {
        return $this->maintainer;
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
     * @param int $tkw
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
     * @return int
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
}

