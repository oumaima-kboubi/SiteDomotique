<?php

namespace App\Repository;

use App\Entity\ScenarioEclairage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScenarioEclairage|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScenarioEclairage|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScenarioEclairage[]    findAll()
 * @method ScenarioEclairage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScenarioEclairageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScenarioEclairage::class);
    }

    /**
     * @param $lampe
     * @return int|mixed|string
     */
    public function findAllHistoryOfLamp($lampe)
    {
        return $this->createQueryBuilder('s')
            ->where('s.lampe = :val')
            ->setParameter('val', $lampe)
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $lampe
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfLampByIntervall($lampe,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.lampe = :val')
            ->setParameter('val', $lampe)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $lampe
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfLampStartedIntervall($lampe,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.lampe = :val')
            ->setParameter('val', $lampe)
            ->andWhere('s.dateDebutActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $lampe
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfLampFinishedInIntervall($lampe,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.lampe = :val')
            ->setParameter('val', $lampe)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateFinActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $lampe
     * @return int|mixed|string
     */
    public function findScenarioEnExecutionByLamp($lampe) {
        return $this->createQueryBuilder('s')
            ->where('s.lampe = :val')
            ->setParameter('val', $lampe)
            ->orderBy('s.dateDebutActivation','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $actionneur
     * @return int|mixed|string
     */
    public function findScenarioEnExecutionByActuator($actionneur) {
        return $this->createQueryBuilder('s')
            ->where('s.actionneur = :val')
            ->setParameter('val', $actionneur)
            ->orderBy('s.dateDebutActivation','DESC')
            ->setMaxResults(1)
            ->getQuery()
            ->getResult()
            ;
    }
}
