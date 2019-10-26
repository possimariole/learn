<?php

namespace App\Repository;

use App\Entity\Ertre;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Ertre|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ertre|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ertre[]    findAll()
 * @method Ertre[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ErtreRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Ertre::class);
    }

    // /**
    //  * @return Ertre[] Returns an array of Ertre objects
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
    public function findOneBySomeField($value): ?Ertre
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
