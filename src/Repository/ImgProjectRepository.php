<?php

namespace App\Repository;

use App\Entity\ImgProject;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImgProject|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgProject|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgProject[]    findAll()
 * @method ImgProject[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImgProject::class);
    }

    // /**
    //  * @return ImgProject[] Returns an array of ImgProject objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ImgProject
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
