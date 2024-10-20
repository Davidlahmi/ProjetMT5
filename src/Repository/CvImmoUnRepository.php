<?php

namespace App\Repository;

use App\Entity\CvImmoUn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CvImmoUn>
 *
 * @method CvImmoUn|null find($id, $lockMode = null, $lockVersion = null)
 * @method CvImmoUn|null findOneBy(array $criteria, array $orderBy = null)
 * @method CvImmoUn[]    findAll()
 * @method CvImmoUn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CvImmoUnRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CvImmoUn::class);
    }

//    /**
//     * @return CvImmoUn[] Returns an array of CvImmoUn objects
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

//    public function findOneBySomeField($value): ?CvImmoUn
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
