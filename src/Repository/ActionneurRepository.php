<?php

namespace App\Repository;

use App\Entity\Actionneur;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Actionneur|null find($id, $lockMode = null, $lockVersion = null)
 * @method Actionneur|null findOneBy(array $criteria, array $orderBy = null)
 * @method Actionneur[]    findAll()
 * @method Actionneur[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionneurRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Actionneur::class);
    }
}
