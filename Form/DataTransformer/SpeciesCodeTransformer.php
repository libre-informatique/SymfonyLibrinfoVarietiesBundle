<?php

namespace Librinfo\VarietiesBundle\Form\DataTransformer;

use Symfony\Component\Form\DataTransformerInterface;

class SpeciesCodeTransformer implements DataTransformerInterface
{
    /**
     * @param  string|null $code
     * @return string|null
     */
    public function transform($code)
    {
        return $code;
    }

    /**
     * @param  string|null $code
     * @return string|null
     */
    public function reverseTransform($code)
    {
        return strtoupper(trim($code));
    }
}
