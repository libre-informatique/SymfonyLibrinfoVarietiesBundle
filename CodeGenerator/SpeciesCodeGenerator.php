<?php

namespace Librinfo\VarietiesBundle\CodeGenerator;

use Doctrine\ORM\EntityManager;
use Blast\CoreBundle\CodeGenerator\CodeGeneratorInterface;
use Librinfo\VarietiesBundle\Entity\Species;
use Blast\CoreBundle\Exception\InvalidEntityCodeException;

class SpeciesCodeGenerator implements CodeGeneratorInterface
{
    /**
     * @var EntityManager
     */
    private static $em;

    const ENTITY_CLASS = 'Librinfo\VarietiesBundle\Entity\Species';
    const ENTITY_FIELD = 'code';

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
            throw new InvalidEntityCodeException('librinfo.error.missing_species_name');

        // Unaccent, remove marks and punctuation, uppercase
        $translit = transliterator_transliterate(
            'Any-Latin; Latin-ASCII; [:Nonspacing Mark:] Remove; [:Punctuation:] Remove; Upper();',
            $species->getName()
        );
        // Remove everything that is not a letter or a digit
        $cleaned = preg_replace('/[^A-Z0-9]/', '', $translit);

        // 3 first chars (right padded with "X" if necessary)
        $code = str_pad(substr($cleaned, 0, 3), 3, 'X');
        if (self::isCodeUnique($code, $species->getId()))
            return $code;

        // XX1 ... XX9
        for($i = 1; $i < 10; $i++) {
            $code = sprintf('%s%d', substr($code, 0, 2), $i);
            if (self::isCodeUnique($code, $species->getId()))
                return $code;
        }

        // X01 ... X99
        for($i = 1; $i < 100; $i++) {
            $code = sprintf('%s%02d', substr($code, 0, 1), $i);
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

    public static function getHelp()
    {
        return "3 chars (digits and upper case letters)";
    }

}