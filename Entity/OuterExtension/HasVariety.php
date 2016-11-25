<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Librinfo\VarietiesBundle\Entity\OuterExtension;

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