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
    private $group;

    /**
     * @var string
     */
    private $field;

    /**
     * @var string
     */
    private $value;


    /**
     * Set group
     *
     * @param string $group
     *
     * @return GenericDescription
     */
    public function setGroup($group)
    {
        $this->group = $group;

        return $this;
    }

    /**
     * Get group
     *
     * @return string
     */
    public function getGroup()
    {
        return $this->group;
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

