<?php

namespace App\Repository;

use App\Entity\EquipmentProducer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method EquipmentProducer|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipmentProducer|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipmentProducer[]    findAll()
 * @method EquipmentProducer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipmentProducerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EquipmentProducer::class);
    }

    // /**
    //  * @return EquipmentProducer[] Returns an array of EquipmentProducer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipmentProducer
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
