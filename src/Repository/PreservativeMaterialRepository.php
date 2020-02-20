<?php

namespace App\Repository;

use App\Entity\PreservativeMaterial;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PreservativeMaterial|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreservativeMaterial|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreservativeMaterial[]    findAll()
 * @method PreservativeMaterial[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreservativeMaterialRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreservativeMaterial::class);
    }

    // /**
    //  * @return PreservativeMaterial[] Returns an array of PreservativeMaterial objects
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
    public function findOneBySomeField($value): ?PreservativeMaterial
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
