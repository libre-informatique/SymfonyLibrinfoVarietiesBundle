<?php

/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Librinfo\VarietiesBundle\Twig;

class VarietyDescription extends \Twig_Extension
{
    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('displayVarietyDescription', [$this, 'displayVarietyDescription'], ['is_safe'=>['html']]),
        ];
    }

    public function displayVarietyDescription($varietyDescription)
    {
        $fieldSet = $varietyDescription->getFieldset();
        $field = $varietyDescription->getField();
        $value = $varietyDescription->getValue();

        $config = $this->varietyConfig['variety_descriptions'];

        if (array_key_exists($fieldSet, $config)) {
            $configFieldset = $config[$fieldSet];
        }

        return $value;
    }

    public function setVarietyConfig($config)
    {
        $this->varietyConfig = $config;
    }
}
