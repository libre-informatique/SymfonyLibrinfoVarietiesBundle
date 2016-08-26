<?php

namespace Librinfo\VarietiesBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class VarietyDescriptionRepository extends EntityRepository
{
    public function getDisctinct($fieldset)
    {
        $qb = $this->createQueryBuilder('v')
                ->distinct(true);
        return $qb;
    }
}