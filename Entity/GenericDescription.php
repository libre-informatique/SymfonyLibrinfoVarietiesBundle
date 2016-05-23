<?php

namespace Librinfo\VarietiesBundle\Entity;

use Librinfo\DoctrineBundle\Entity\Traits\BaseEntity;

/**
 * GenericDescription
 */
class GenericDescription
{
    use BaseEntity;

    /**
     * @var string
     */
    private $fieldset;

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $value;


    /**
     * Set fieldset
     *
     * @param string $fieldset
     *
     * @return GenericDescription
     */
    public function setFieldset($fieldset)
    {
        $this->fieldset = $fieldset;

        return $this;
    }

    /**
     * Get fieldset
     *
     * @return string
     */
    public function getFieldset()
    {
        return $this->fieldset;
    }

    /**
     * Set field
     *
     * @param string $field
     *
     * @return GenericDescription
     */
    public function setField($field)
    {
        $this->field = $field;

        return $this;
    }

    /**
     * Get field
     *
     * @return string
     */
    public function getField()
    {
        return $this->field;
    }

    /**
     * Set value
     *
     * @param string $value
     *
     * @return GenericDescription
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
}

