<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;
use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\UserBundle\Entity\Traits\Traceable;
use Librinfo\DoctrineBundle\Entity\Traits\Descriptible;

/**
 * Family
 */
class Family
{
    use BaseEntity,
        Nameable,
        Traceable,
        Descriptible
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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $genuses;

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
        $this->genuses = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set latinName
     *
     * @param string $latinName
     *
     * @return Family
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
     * @return Family
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
     * Add genus
     *
     * @param \Librinfo\VarietiesBundle\Entity\Genus $genus
     *
     * @return Family
     */
    public function addGenus(\Librinfo\VarietiesBundle\Entity\Genus $genus)
    {
        $genus->setFamily($this);
        $this->genuses->add($genus);
        return $this;
    }

    /**
     * Remove genus
     *
     * @param \Librinfo\VarietiesBundle\Entity\Genus $genus
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeGenus(\Librinfo\VarietiesBundle\Entity\Genus $genus)
    {
        return $this->genuses->removeElement($genus);
    }

    /**
     * Get genuses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGenuses()
    {
        return $this->genuses;
    }
}
