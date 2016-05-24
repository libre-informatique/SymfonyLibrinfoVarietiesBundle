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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $varieties;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->varieties = new ArrayCollection();
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
     * Add variety
     *
     * @param \Librinfo\VarietiesBundle\Entity\Variety $variety
     *
     * @return PlantCategory
     */
    public function addVariety(\Librinfo\VarietiesBundle\Entity\Variety $variety)
    {
        $this->varieties[] = $variety;

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

