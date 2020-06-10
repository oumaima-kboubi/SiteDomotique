<?php

namespace App\Repository;

use App\Entity\Metrique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Metrique|null find($id, $lockMode = null, $lockVersion = null)
 * @method Metrique|null findOneBy(array $criteria, array $orderBy = null)
 * @method Metrique[]    findAll()
 * @method Metrique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetriqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Metrique::class);
    }

    /**
     * @param $capteur
     * @return int|mixed|string
     */
    public function findAllHistoryOfSensor($capteur)
    {
        return $this->createQueryBuilder('m')
            ->where('m.capteur = :val')
            ->setParameter('val', $capteur)
            ->orderBy('m.modifiedAt','DESC')
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
        ;
    }

    /**
     * @param $capteur
     * @param $dateMin
     * @param $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfSensorByIntervall($capteur,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('m')
            ->where('m.capteur = :val')
            ->setParameter('val', $capteur)
            ->andWhere('(m.modifiedAt IS null AND (m.createdAt <= : dateMax AND m.createdAt >= :dateMin)) OR (m.modifiedAt IS NOT null AND (m.modifiedAt <= : dateMax AND m.modifiedAt >= :dateMin))')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('m.modifiedAt','DESC')
            ->orderBy('m.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}
