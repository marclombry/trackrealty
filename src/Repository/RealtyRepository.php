<?php

namespace App\Repository;

use App\Entity\Realty;
use App\Entity\Tenant;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Realty|null find($id, $lockMode = null, $lockVersion = null)
 * @method Realty|null findOneBy(array $criteria, array $orderBy = null)
 * @method Realty[]    findAll()
 * @method Realty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RealtyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Realty::class);
    }

    // /**
    //  * @return Realty[] Returns an array of Realty objects
    //  */
    /*
    public function f()
    {
        return $this->createQueryBuilder('r')
            
           
            ->leftJoin('r.Id','Id')
          
         
            ->getQuery()
            ->getResult()
        ;
    }
    */
  /*
    SELECT * FROM App\Entity\Realty r
    LEFT JOIN App\Entity\Tenant t WITH r.id = t.id 

  */

    /*
    public function findOneBySomeField($value): ?Realty
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
