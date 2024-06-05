<?php

namespace App\Repository;

use App\Entity\Cars;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Cars>
 *
 * @method Cars|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cars|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cars[]    findAll()
 * @method Cars[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CarsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Cars::class);
    }

    public function findByCriteria($kmMin, $kmMax, 
    $yearMin, $yearMax, $priceMin, $priceMax){

        //Request building
        return $this->createQueryBuilder('c')
            
            //Filter by kilometer
            ->andWhere('c.kilometer >= :kmMin')
            ->setParameter('kmMin', $kmMin)
            ->andWhere('c.kilometer <= :kmMax')
            ->setParameter('kmMax', $kmMax)
            //Filter by year
            ->andWhere('c.build_year >= :yearMin')
            ->setParameter('yearMin', $yearMin)
            ->andWhere('c.build_year <= :yearMax')
            ->setParameter('yearMax', $yearMax)
            //Filter by price
            ->andWhere('c.price >= :priceMin')
            ->setParameter('priceMin', $priceMin)
            ->andWhere('c.price <= :priceMax')
            ->setParameter('priceMax', $priceMax)

            //Result
            ->getQuery()
            ->getResult()
        ;
    }
}
