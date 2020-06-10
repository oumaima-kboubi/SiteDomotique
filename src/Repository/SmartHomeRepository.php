<?php

namespace App\Repository;

use App\Entity\SmartHome;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SmartHome|null find($id, $lockMode = null, $lockVersion = null)
 * @method SmartHome|null findOneBy(array $criteria, array $orderBy = null)
 * @method SmartHome[]    findAll()
 * @method SmartHome[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SmartHomeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SmartHome::class);
    }

    // /**
    //  * @return SmartHome[] Returns an array of SmartHome objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?SmartHome
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
