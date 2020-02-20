<?php

namespace App\Repository;

use App\Entity\PreservativeMaterialUnit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PreservativeMaterialUnit|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreservativeMaterialUnit|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreservativeMaterialUnit[]    findAll()
 * @method PreservativeMaterialUnit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreservativeMaterialUnitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreservativeMaterialUnit::class);
    }

    // /**
    //  * @return PreservativeMaterialUnit[] Returns an array of PreservativeMaterialUnit objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PreservativeMaterialUnit
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
