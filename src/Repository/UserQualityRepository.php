<?php

namespace App\Repository;

use App\Entity\UserQuality;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserQuality|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserQuality|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserQuality[]    findAll()
 * @method UserQuality[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserQualityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserQuality::class);
    }

    // /**
    //  * @return UserQuality[] Returns an array of UserQuality objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserQuality
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
