<?php

namespace App\Repository;

use App\Entity\ServiceActionPerformed;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method ServiceActionPerformed|null find($id, $lockMode = null, $lockVersion = null)
 * @method ServiceActionPerformed|null findOneBy(array $criteria, array $orderBy = null)
 * @method ServiceActionPerformed[]    findAll()
 * @method ServiceActionPerformed[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ServiceActionPerformedRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ServiceActionPerformed::class);
    }

    // /**
    //  * @return ServiceActionPerformed[] Returns an array of ServiceActionPerformed objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ServiceActionPerformed
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
