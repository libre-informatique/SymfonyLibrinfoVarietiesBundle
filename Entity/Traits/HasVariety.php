<?php

namespace Librinfo\VarietiesBundle\Entity\Traits;

trait HasVariety
{
    /**
     * @var Variety
     */
    private $variety;

    /**
     * Get variety
     *
     * @return Variety
     */
    public function getVariety()
    {
        return $this->variety;
    }

    /**
     * Set variety
     *
     * @param object $variety
     * @return Object
     */
    public function setVariety($variety)
    {
        $this->variety = $variety;
        return $this;
    }

}