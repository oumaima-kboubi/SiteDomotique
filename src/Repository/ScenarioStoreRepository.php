<?php

namespace App\Repository;

use App\Entity\ScenarioStore;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScenarioStore|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScenarioStore|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScenarioStore[]    findAll()
 * @method ScenarioStore[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScenarioStoreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScenarioStore::class);
    }

    /**
     * @param $store
     * @return int|mixed|string
     */
    public function findAllHistoryOfThermostat($store)
    {
        return $this->createQueryBuilder('s')
            ->where('s.store = :val')
            ->setParameter('val', $store)
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $store
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfStoreByIntervall($store,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.store = :val')
            ->setParameter('val', $store)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $store
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfStoreStartedIntervall($store,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.store = :val')
            ->setParameter('val', $store)
            ->andWhere('s.dateDebutActivation <= : dateMax AND s.dateDebutActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $store
     * @param $dateMin
     * @param string $dateMax
     * @return int|mixed|string
     */
    public function findHistoryOfStoreFinishedInIntervall($store,$dateMin,$dateMax='now')
    {
        return $this->createQueryBuilder('s')
            ->where('s.store = :val')
            ->setParameter('val', $store)
            ->andWhere('s.dateFinActivation <= : dateMax AND s.dateFinActivation >= :dateMin')
            ->setParameters(['dateMin'=>$dateMin,'dateMax'=>$dateMax])
            ->orderBy('s.dateDebutActivation','DESC')
            ->getQuery()
            ->getResult()
            ;
    }

    /**
     * @param $store
     * @return int|mixed|string
     */
    public function findScenarioEnExecutionByStore($store) {
        return $this->createQueryBuilder('s')
            ->where('s.store = :val')
            ->setParameter('val', $store)
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
