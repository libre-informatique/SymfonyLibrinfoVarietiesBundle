<?php

namespace Librinfo\VarietiesBundle\CodeGenerator;

use Doctrine\ORM\EntityManager;
use Librinfo\CoreBundle\CodeGenerator\CodeGeneratorInterface;
use Librinfo\VarietiesBundle\Entity\Species;
use Librinfo\VarietiesBundle\Exception\InvalidSpeciesCodeException;

class SpeciesCodeGenerator implements CodeGeneratorInterface
{
    /**
     * @var EntityManager
     */
    private static $em;

    public static $entityClass = 'Librinfo\VarietiesBundle\Entity\Species';
    public static $entityField = 'code';

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
        if (!$species->getName())
            throw new InvalidSeedBatchCodeException('librinfo.error.missing_species_name');

        // Multibyte string padding utiliy function
        function mb_str_pad($str, $pad_len, $pad_str = ' ')
        {
            $encoding = mb_internal_encoding();
            $pad_len -= mb_strlen($str, $encoding);
            $targetLen = $pad_len;
            $strToRepeatLen = mb_strlen($pad_str, $encoding);
            $repeatTimes = ceil($targetLen / $strToRepeatLen);
            $repeatedString = str_repeat($pad_str, max(0, $repeatTimes)); // safe if used with valid utf-8 strings
            $after = mb_substr($repeatedString, 0, ceil($targetLen), $encoding);
            return $str . $after;
        }

        // 3 first chars of name, uppercase and right padded with "X"
        $code = mb_str_pad(mb_substr(mb_strtoupper($species->getName()), 0, 3), 3, 'X');
        if (self::isCodeUnique($code, $species->getId()))
            return $code;

        // XX1 ... XX9
        for($i = 1; $i < 10; $i++) {
            $code = sprintf('%s%d', mb_substr($code, 0, 2), $i);
            if (self::isCodeUnique($code, $species->getId()))
                return $code;
        }

        // X01 ... X99
        for($i = 1; $i < 100; $i++) {
            $code = sprintf('%s%02d', mb_substr($code, 0, 1), $i);
            if (self::isCodeUnique($code, $species->getId()))
                return $code;
        }

        // 001 ... 999
        // TODO: find a better solution !!
        for($i = 1; $i < 1000; $i++) {
            $code = sprintf('%03d', $i);
            if (self::isCodeUnique($code, $species->getId()))
                return $code;
        }
        return '';
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

    /**
     * @param string $code
     * @param guid $speciesId
     * @return boolean
     */
    private static function isCodeUnique($code, $speciesId)
    {
        $repo = self::$em->getRepository('Librinfo\VarietiesBundle\Entity\Species');
        $query = $repo->createQueryBuilder('s')->where('s.code = :code')->setParameter('code', $code);
        if ($speciesId)
            $query->andWhere('s.id != :id')->setParameter ('id', $speciesId);
        $result = $query->getQuery()->setMaxResults(1)->getOneOrNullResult();
        return $result == null;
    }

}