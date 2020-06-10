<?php

namespace App\Repository;

use App\Entity\Etat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Etat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Etat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Etat[]    findAll()
 * @method Etat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EtatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Etat::class);
    }

    /**
     * @param $actionneur
     * @return int|mixed|string
     */
    public function findAllHistoryOfActuator($actionneur)
    {
        return $this->createQueryBuilder('e')
            ->where('e.actionneur = :val')
            ->setParameter('val', $actionneur)
            ->orderBy('e.modifiedAt','DESC')
            ->orderBy('e.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $actionneur
     * @param $dateMin
     * @param $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfActuatorByIntervall($actionneur,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('e')
            ->where('e.actionneur = :val')
            ->setParameter('val', $actionneur)
            ->andWhere('(e.modifiedAt IS null AND (e.createdAt <= : dateMax AND e.createdAt >= :dateMin)) OR (e.modifiedAt IS NOT null AND (e.modifiedAt <= : dateMax AND e.modifiedAt >= :dateMin))')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('e.modifiedAt','DESC')
            ->orderBy('e.createdAt', 'DESC')
            ->getQuery()
            ->getResult()
            ;
    }
}
