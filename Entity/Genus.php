<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;
use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\UserBundle\Entity\Traits\Traceable;
use Librinfo\DoctrineBundle\Entity\Traits\Descriptible;

/**
 * Genus
 */
class Genus
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
     * @var \Librinfo\VarietiesBundle\Entity\Family
     */
    private $family;


    /**
     * Set latinName
     *
     * @param string $latinName
     *
     * @return Genus
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
     * @return Genus
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
     * Set family
     *
     * @param \Librinfo\VarietiesBundle\Entity\Family $family
     *
     * @return Genus
     */
    public function setFamily(\Librinfo\VarietiesBundle\Entity\Family $family = null)
    {
        $this->family = $family;

        return $this;
    }

    /**
     * Get family
     *
     * @return \Librinfo\VarietiesBundle\Entity\Family
     */
    public function getFamily()
    {
        return $this->family;
    }
}
