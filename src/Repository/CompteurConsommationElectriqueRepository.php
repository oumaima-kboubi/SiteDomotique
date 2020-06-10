<?php

namespace App\Repository;

use App\Entity\CompteurConsommationElectrique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CompteurConsommationElectrique|null find($id, $lockMode = null, $lockVersion = null)
 * @method CompteurConsommationElectrique|null findOneBy(array $criteria, array $orderBy = null)
 * @method CompteurConsommationElectrique[]    findAll()
 * @method CompteurConsommationElectrique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CompteurConsommationElectriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CompteurConsommationElectrique::class);
    }

    // /**
    //  * @return CompteurConsommationElectrique[] Returns an array of CompteurConsommationElectrique objects
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
    public function findOneBySomeField($value): ?CompteurConsommationElectrique
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
