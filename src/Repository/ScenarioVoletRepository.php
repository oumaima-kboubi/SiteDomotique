<?php

namespace App\Repository;

use App\Entity\ScenarioVolet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScenarioVolet|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScenarioVolet|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScenarioVolet[]    findAll()
 * @method ScenarioVolet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScenarioVoletRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScenarioVolet::class);
    }

    /**
     * @param $volet
     * @return int|mixed|string
     */
    public function findAllHistoryOfVolet($volet)
    {
        return $this->createQueryBuilder('s')
            ->where('s.volet = :val')
            ->setParameter('val', $volet)
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $volet
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfVoletByIntervall($volet,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.volet = :val')
            ->setParameter('val', $volet)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $volet
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfVoletStartedIntervall($volet,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.volet = :val')
            ->setParameter('val', $volet)
            ->andWhere('s.dateDebutActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $volet
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfVoletFinishedInIntervall($volet,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.volet = :val')
            ->setParameter('val', $volet)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateFinActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $volet
     * @return int|mixed|string
     */
    public function findScenarioEnExecutionByVolet($volet) {
        return $this->createQueryBuilder('s')
            ->where('s.volet = :val')
            ->setParameter('val', $volet)
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
