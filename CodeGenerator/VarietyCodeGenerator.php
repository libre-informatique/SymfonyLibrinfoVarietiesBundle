<?php

namespace Librinfo\VarietiesBundle\CodeGenerator;

use Doctrine\ORM\EntityManager;
use Librinfo\CoreBundle\CodeGenerator\CodeGeneratorInterface;
use Librinfo\VarietiesBundle\Entity\Variety;
use Librinfo\CoreBundle\Exception\InvalidEntityCodeException;

class VarietyCodeGenerator implements CodeGeneratorInterface
{
    /**
     * @var EntityManager
     */
    private static $em;

    public static $entityClass = 'Librinfo\VarietiesBundle\Entity\Variety';
    public static $entityField = 'code';

    public static function setEntityManager(EntityManager $em)
    {
        self::$em = $em;
    }

    /**
     * @param  Variety $variety
     * @return string
     * @throws InvalidEntityCodeException
     */
    public static function generate($variety)
    {
        if (!$variety->getSpecies())
            throw new InvalidEntityCodeException('librinfo.error.missing_species');
        if (!$variety->getSpecies()->getCode())
            throw new InvalidEntityCodeException('librinfo.error.missing_species_code');
        if (!$variety->getName())
            throw new InvalidEntityCodeException('librinfo.error.missing_variety_name');
        if ($variety->getIsStrain() && !$variety->getParent())
            throw new InvalidEntityCodeException('librinfo.error.missing_strain_parent');
        if ($variety->getIsStrain() && !$variety->getParent()->getCode())
            throw new InvalidEntityCodeException('librinfo.error.missing_strain_parent_code');

        $species = $variety->getSpecies();

        if ($variety->getIsStrain()) {
            // Prepend with parent name
            $prefix = $variety->getParent()->getCode();
            // Unaccent, remove marks and punctuation, lower case
            $translit = transliterator_transliterate(
                'Any-Latin; Latin-ASCII; [:Nonspacing Mark:] Remove; [:Punctuation:] Remove; Lower();',
                $variety->getName()
            );
            $length = 2;
            $pad = 'x';
        }
        else {
            $prefix = '';
            // Unaccent, remove marks and punctuation, upper case
            $translit = transliterator_transliterate(
                'Any-Latin; Latin-ASCII; [:Nonspacing Mark:] Remove; [:Punctuation:] Remove; Upper();',
                $variety->getName()
            );
            $length = 3;
            $pad = 'X';
        }

        // Remove everything that is not a letter or a digit
        $cleaned = preg_replace('/[^A-Z0-9]/', '', $translit);

        // first chars of name, right padded with "X" if necessary
        $code = $prefix . str_pad(substr($cleaned, 0, $length), $length, $pad);

        if (self::isCodeUnique($code, $variety))
            return $code;

        // XX1 ... XX9
        for($i = 1; $i < 10; $i++) {
            $code = $prefix . sprintf('%s%d', substr($code, 0, $length-1), $i);
            if (self::isCodeUnique($code, $variety))
                return $code;
        }

        // X01 ... X99
        for($i = 1; $i < 100; $i++) {
            $code = $prefix . sprintf('%s%02d', substr($code, 0, $length-2), $i);
            if (self::isCodeUnique($code, $variety))
                return $code;
        }

        // 001 ... 999
        // TODO: find a better solution !!
        if (!$variety->getIsStrain())
            for($i = 1; $i < 1000; $i++) {
                $code = sprintf('%03d', $i);
                if (self::isCodeUnique($code, $variety))
                    return $code;
            }
        return '';
    }

    /**
     * @param string    $code
     * @param Variety   $variety
     * @return          boolean
     */
    public static function validate($code, $variety = null)
    {
        if ($variety->getIsStrain()) {
            if ($variety->getParent() && substr($code, 0, 3) != $variety->getParent()->getCode())
                return false;
            return preg_match('/^[A-Z0-9]{3}[a-z0-9]{2}$/', $code) > 0;
        }
        else
            return preg_match('/^[A-Z0-9]{3}$/', $code) > 0;
    }

    /**
     * @param string $code
     * @param Variety $variety
     * @return boolean
     */
    private static function isCodeUnique($code, $variety)
    {
        $repo = self::$em->getRepository('Librinfo\VarietiesBundle\Entity\Variety');
        $query = $repo->createQueryBuilder('v')
            ->where('v.code = :code')
            ->andWhere('v.species = :species')
            ->setParameters(['code' => $code, 'species' => $variety->getSpecies()]);
        if ($variety->getId())
            $query->andWhere('v.id != :id')->setParameter ('id', $variety->getId());
        $result = $query->getQuery()->setMaxResults(1)->getOneOrNullResult();
        return $result == null;
    }

}