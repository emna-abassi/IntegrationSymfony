<?php

namespace App\Repository;

use App\Entity\CanceledReservation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CanceledReservation|null find($id, $lockMode = null, $lockVersion = null)
 * @method CanceledReservation|null findOneBy(array $criteria, array $orderBy = null)
 * @method CanceledReservation[]    findAll()
 * @method CanceledReservation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CanceledReservationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CanceledReservation::class);
    }

    // /**
    //  * @return CanceledReservation[] Returns an array of CanceledReservation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CanceledReservation
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
