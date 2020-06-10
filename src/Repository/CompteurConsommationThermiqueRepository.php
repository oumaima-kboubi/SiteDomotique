<?php

namespace App\Repository;

use App\Entity\CompteurConsommationThermique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompteurConsommationThermique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteurConsommationThermique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteurConsommationThermique[]    findAll()
 * @method CompteurConsommationThermique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteurConsommationThermiqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteurConsommationThermique::class);
    }

    // /**
    //  * @return CompteurConsommationThermique[] Returns an array of CompteurConsommationThermique objects
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
    public function findOneBySomeField($value): ?CompteurConsommationThermique
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
