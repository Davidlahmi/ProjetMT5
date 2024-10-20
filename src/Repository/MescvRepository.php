<?php

namespace App\Repository;

use App\Entity\Mescv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Mescv>
 *
 * @method Mescv|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mescv|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mescv[]    findAll()
 * @method Mescv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MescvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Mescv::class);
    }

//    /**
//     * @return Mescv[] Returns an array of Mescv objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('m.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Mescv
//    {
//        return $this->createQueryBuilder('m')
//            ->andWhere('m.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
