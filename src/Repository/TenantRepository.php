<?php

namespace App\Repository;

use App\Entity\Tenant;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use PhpParser\Node\Expr\Cast\Array_;

/**
 * @method Tenant|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tenant|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tenant[]    findAll()
 * @method Tenant[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TenantRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Tenant::class);
    }

    // /**
    //  * @return Tenant[] Returns an array of Tenant objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */
    public function findByRealty($value)
    {
        return $this->createQueryBuilder('t')
        ->leftJoin('App\Entity\Realty', 'r', Join::WITH,  'r = t.realty')
        ->where('r.user = :user')
        ->setParameter('user',$value)
        ->getQuery()
        ->getResult()
        ;
    }

    public function findAllTenantByRealty($idUserConnected): Array
    {
        $conn =$this->getEntityManager()->getConnection();

        $sql = '
            SELECT * FROM tenant t
            LEFT JOIN realty r On t.realty_id = r.id
            where r.user_id =:id
        ';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['id'=>$idUserConnected]);

        return $stmt->fetchAll();
    }
    

    /*
    public function findOneBySomeField($value): ?Tenant
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
