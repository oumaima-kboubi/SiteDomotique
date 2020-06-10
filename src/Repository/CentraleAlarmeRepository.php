<?php

namespace App\Repository;

use App\Entity\CentraleAlarme;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CentraleAlarme|null find($id, $lockMode = null, $lockVersion = null)
 * @method CentraleAlarme|null findOneBy(array $criteria, array $orderBy = null)
 * @method CentraleAlarme[]    findAll()
 * @method CentraleAlarme[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CentraleAlarmeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CentraleAlarme::class);
    }

    // /**
    //  * @return CentraleAlarme[] Returns an array of CentraleAlarme objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CentraleAlarme
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
