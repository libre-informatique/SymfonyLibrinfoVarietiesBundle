<?php

namespace Librinfo\VarietiesBundle\CodeGenerator;

use Doctrine\ORM\EntityManager;
use Librinfo\CoreBundle\CodeGenerator\CodeGeneratorInterface;
use Librinfo\VarietiesBundle\Entity\Species;
use Librinfo\VarietiesBundle\Exception\InvalidSpeciesCodeException;

class SpeciesCodeGenerator implements CodeGeneratorInterface
{
    private static $em;

    public static function setEntityManager(EntityManager $em)
    {
        self::$em = $em;
    }

    /**
     * @param  Species $species
     * @return string
     * @throws InvalidSpeciesCodeException
     */
    public static function generate($species)
    {
        // 3 first chars of name, uppercase and right padded with "X"
        $code = str_pad(substr(strtoupper($species->getName()), 0, 3), 3, 'X');
        return $code;
    }

    /**
     * @param string    $code
     * @param Species   $species
     * @return          boolean
     */
    public static function validate($code, $species = null)
    {
        if (!preg_match('/^[A-Z0-9]{3}$/', $code))
            return false;
        return true;
    }

}