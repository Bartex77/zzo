<?php

namespace App\Repository;

use App\Entity\TimeInterval;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TimeInterval|null find($id, $lockMode = null, $lockVersion = null)
 * @method TimeInterval|null findOneBy(array $criteria, array $orderBy = null)
 * @method TimeInterval[]    findAll()
 * @method TimeInterval[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TimeIntervalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TimeInterval::class);
    }

    // /**
    //  * @return Interval[] Returns an array of Interval objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Interval
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
