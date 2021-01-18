<?php

namespace App\Repository;

use App\Entity\ImgDesign;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ImgDesign|null find($id, $lockMode = null, $lockVersion = null)
 * @method ImgDesign|null findOneBy(array $criteria, array $orderBy = null)
 * @method ImgDesign[]    findAll()
 * @method ImgDesign[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ImgDesignRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ImgDesign::class);
    }

    // /**
    //  * @return ImgDesign[] Returns an array of ImgDesign objects
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
    public function findOneBySomeField($value): ?ImgDesign
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
