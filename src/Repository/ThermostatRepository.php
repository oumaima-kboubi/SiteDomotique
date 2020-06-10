<?php

namespace App\Repository;

use App\Entity\Thermostat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Thermostat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Thermostat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Thermostat[]    findAll()
 * @method Thermostat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ThermostatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Thermostat::class);
    }

    // /**
    //  * @return Thermostat[] Returns an array of Thermostat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Thermostat
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
