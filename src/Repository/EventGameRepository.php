<?php

namespace App\Repository;

use App\Entity\EventGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EventGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method EventGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method EventGame[]    findAll()
 * @method EventGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EventGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EventGame::class);
    }

    // /**
    //  * @return EventGame[] Returns an array of EventGame objects
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
    public function findOneBySomeField($value): ?EventGame
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
