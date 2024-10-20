<?php

namespace App\Repository;

use App\Entity\PetiteEnfance;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PetiteEnfance>
 *
 * @method PetiteEnfance|null find($id, $lockMode = null, $lockVersion = null)
 * @method PetiteEnfance|null findOneBy(array $criteria, array $orderBy = null)
 * @method PetiteEnfance[]    findAll()
 * @method PetiteEnfance[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PetiteEnfanceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PetiteEnfance::class);
    }

//    /**
//     * @return PetiteEnfance[] Returns an array of PetiteEnfance objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('p.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PetiteEnfance
//    {
//        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
