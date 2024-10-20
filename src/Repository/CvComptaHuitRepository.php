<?php

namespace App\Repository;

use App\Entity\CvComptaHuit;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<CvComptaHuit>
 *
 * @method CvComptaHuit|null find($id, $lockMode = null, $lockVersion = null)
 * @method CvComptaHuit|null findOneBy(array $criteria, array $orderBy = null)
 * @method CvComptaHuit[]    findAll()
 * @method CvComptaHuit[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CvComptaHuitRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CvComptaHuit::class);
    }

//    /**
//     * @return CvComptaHuit[] Returns an array of CvComptaHuit objects
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

//    public function findOneBySomeField($value): ?CvComptaHuit
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
