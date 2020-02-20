<?php

namespace App\Repository;

use App\Entity\PreservativeProduct;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method PreservativeProduct|null find($id, $lockMode = null, $lockVersion = null)
 * @method PreservativeProduct|null findOneBy(array $criteria, array $orderBy = null)
 * @method PreservativeProduct[]    findAll()
 * @method PreservativeProduct[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PreservativeProductRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PreservativeProduct::class);
    }

    // /**
    //  * @return PreservativeProduct[] Returns an array of PreservativeProduct objects
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
    public function findOneBySomeField($value): ?PreservativeProduct
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
