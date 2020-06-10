<?php

namespace App\Repository;

use App\Entity\WiFi;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method WiFi|null find($id, $lockMode = null, $lockVersion = null)
 * @method WiFi|null findOneBy(array $criteria, array $orderBy = null)
 * @method WiFi[]    findAll()
 * @method WiFi[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WiFiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, WiFi::class);
    }

    // /**
    //  * @return WiFi[] Returns an array of WiFi objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?WiFi
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
