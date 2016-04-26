<?php

namespace Librinfo\VarietiesBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Knp\DoctrineBehaviors\Model\Tree\NodeInterface;
use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;
use Librinfo\DoctrineBundle\Entity\Traits\Nameable;
use Librinfo\DoctrineBundle\Entity\Traits\Treeable;

/**
 * PlantCategory
 */
class PlantCategory implements NodeInterface
{
    use BaseEntity,
        Treeable,
        Nameable
    ;

    /**
     * @var string
     */
    private $code;

    /**
     * @var Collection
     */
    private $specieses;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->specieses = new ArrayCollection();
    }

    /**
     * Set code
     *
     * @param string $code
     *
     * @return PlantCategory
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
     * Add species
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $species
     *
     * @return PlantCategory
     */
    public function addSpecies(\Librinfo\VarietiesBundle\Entity\Species $species)
    {
        $species->setPlantCategory($this);
        $this->specieses[] = $species;

        return $this;
    }

    /**
     * Remove species
     *
     * @param \Librinfo\VarietiesBundle\Entity\Species $species
     *
     * @return boolean TRUE if this collection contained the specified element, FALSE otherwise.
     */
    public function removeSpecies(\Librinfo\VarietiesBundle\Entity\Species $species)
    {
        return $this->specieses->removeElement($species);
    }

    /**
     * Get specieses
     *
     * @return Collection
     */
    public function getSpecieses()
    {
        return $this->specieses;
    }


    public function setChildNodeOf(NodeInterface $node)
    {
        $path = rtrim($node->getRealMaterializedPath(), static::getMaterializedPathSeparator());
        $this->setMaterializedPath($path);
        $this->setSortMaterializedPath($path . static::getMaterializedPathSeparator() . $this->getId());

        if (null !== $this->parentNode)
        {
            $this->parentNode->getChildNodes()->removeElement($this);
        }

        $this->parentNode = $node;
        $this->parentNode->addChildNode($this);

        foreach ($this->getChildNodes() as $child)
        {
            $child->setChildNodeOf($this);
        }

        return $this;
    }

    public function setParentNode(NodeInterface $node = null)
    {
        $this->parentNode = $node;
        if ($node !== null)
        {
            $this->setChildNodeOf($this->parentNode);
        }
        return $this;
    }
}

