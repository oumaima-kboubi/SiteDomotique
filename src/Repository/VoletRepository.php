<?php

namespace App\Repository;

use App\Entity\Volet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Volet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Volet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Volet[]    findAll()
 * @method Volet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VoletRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Volet::class);
    }

    // /**
    //  * @return Volet[] Returns an array of Volet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Volet
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
