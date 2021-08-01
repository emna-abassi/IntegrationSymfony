<?php

namespace App\Repository;

use App\Entity\Penality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Penality|null find($id, $lockMode = null, $lockVersion = null)
 * @method Penality|null findOneBy(array $criteria, array $orderBy = null)
 * @method Penality[]    findAll()
 * @method Penality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PenalityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Penality::class);
    }

    // /**
    //  * @return Penality[] Returns an array of Penality objects
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
    public function findOneBySomeField($value): ?Penality
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
