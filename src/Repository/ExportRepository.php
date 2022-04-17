<?php

namespace App\Repository;

use App\Entity\Export;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Export|null find($id, $lockMode = null, $lockVersion = null)
 * @method Export|null findOneBy(array $criteria, array $orderBy = null)
 * @method Export[]    findAll()
 * @method Export[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExportRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Export::class);
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function add(Export $entity, bool $flush = true): void
    {
        $this->_em->persist($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    /**
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function remove(Export $entity, bool $flush = true): void
    {
        $this->_em->remove($entity);
        if ($flush) {
            $this->_em->flush();
        }
    }

    public function findAllSearch($lokal = null, $start = null, $end = null)
    {
        $queryBuilder = $this->createQueryBuilder('e')
            ->orderBy('e.id', 'ASC')
        ;

        if ($lokal) {
            $queryBuilder->andWhere('e.lokal = :lokal');
            $queryBuilder->setParameter('lokal', $lokal);
        }

        if ($start && $end) {
            $queryBuilder->andWhere('e.date BETWEEN :start AND :end');
            $queryBuilder->setParameter('start', $start);
            $queryBuilder->setParameter('end', $end);
        } elseif ($start) {
            $queryBuilder->andWhere('e.date >= :start');
            $queryBuilder->setParameter('start', $start);
        } elseif ($end) {
            $queryBuilder->andWhere('e.date <= :end');
            $queryBuilder->setParameter('end', $end);
        }

        return $queryBuilder->getQuery()->getResult();
    }
    
}
