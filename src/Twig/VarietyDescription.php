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

use Symfony\Component\Translation\TranslatorInterface;

class VarietyDescription extends \Twig_Extension
{
    /**
     * @var TranslatorInterface
     */
    private $translator;

    /**
     * @var array
     */
    private $varietyConfig;

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('displayVarietyDescriptionLabel', [$this, 'displayVarietyDescriptionLabel'], ['is_safe'=>['html']]),
            new \Twig_SimpleFunction('displayVarietyDescriptionValue', [$this, 'displayVarietyDescriptionValue'], ['is_safe'=>['html']]),
        ];
    }

    public function displayVarietyDescriptionLabel($varietyDescription)
    {
        return $this->displayVarietyDescription($varietyDescription, true);
    }

    public function displayVarietyDescriptionValue($varietyDescription)
    {
        return $this->displayVarietyDescription($varietyDescription, false);
    }

    public function displayVarietyDescription($varietyDescription, $label = false)
    {
        $fieldSet = $varietyDescription->getFieldset();
        $field = $varietyDescription->getField();
        $value = $varietyDescription->getValue();

        $config = $this->varietyConfig['variety_descriptions'];

        if (array_key_exists($fieldSet, $config)) {
            $configFieldset = $config[$fieldSet];
        }

        if ($label) {
            $help = $this->translator->trans('librinfo.help.' . $field, [], 'messages');
            $label = $this->translator->trans($field, [], 'messages');

            if ($help != ' ') {
                $label .= ' <small>(' . $help . ')</small>';
            }

            return $label;
        } else {
            return $value;
        }
    }

    public function setVarietyConfig($config)
    {
        $this->varietyConfig = $config;
    }

    /**
     * @param TranslatorInterface translator
     */
    public function setTranslator(TranslatorInterface $translator): void
    {
        $this->translator = $translator;
    }
}
