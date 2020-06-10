<?php

namespace App\Repository;

use App\Entity\ScenarioTemp;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScenarioTemp|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScenarioTemp|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScenarioTemp[]    findAll()
 * @method ScenarioTemp[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScenarioTempRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScenarioTemp::class);
    }

    /**
     * @param $thermostat
     * @return int|mixed|string
     */
    public function findAllHistoryOfThermostat($thermostat)
    {
        return $this->createQueryBuilder('s')
            ->where('s.thermostat = :val')
            ->setParameter('val', $thermostat)
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $thermostat
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfThermostatByIntervall($thermostat,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.thermostat = :val')
            ->setParameter('val', $thermostat)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $thermostat
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfThermostatStartedIntervall($thermostat,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.thermostat = :val')
            ->setParameter('val', $thermostat)
            ->andWhere('s.dateDebutActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $thermostat
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfThermostatFinishedInIntervall($thermostat,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.thermostat = :val')
            ->setParameter('val', $thermostat)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateFinActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $thermostat
     * @return int|mixed|string
     */
    public function findScenarioEnExecutionByThermostat($thermostat) {
        return $this->createQueryBuilder('s')
            ->where('s.thermostat = :val')
            ->setParameter('val', $thermostat)
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
