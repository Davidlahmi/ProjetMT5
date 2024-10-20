<?php

namespace App\Repository;

use App\Entity\Cvteste;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cvteste>
 *
 * @method Cvteste|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cvteste|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cvteste[]    findAll()
 * @method Cvteste[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CvtesteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cvteste::class);
    }

//    /**
//     * @return Cvteste[] Returns an array of Cvteste objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Cvteste
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
