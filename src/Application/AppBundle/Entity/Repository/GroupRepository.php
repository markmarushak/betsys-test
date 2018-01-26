<?php

namespace AppBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;

class GroupRepository extends EntityRepository
{
    public function getGroupsQueryBuilder($alias = 'g')
    {
        $queryBuilder = $this->createQueryBuilder($alias);
        return $queryBuilder;
    }
}