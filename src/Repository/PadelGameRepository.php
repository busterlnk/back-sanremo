<?php

namespace App\Repository;

use App\Entity\PadelGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<PadelGame>
 *
 * @method PadelGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method PadelGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method PadelGame[]    findAll()
 * @method PadelGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PadelGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PadelGame::class);
    }

    public function getPadelGamesByUser($userid){
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT pga.id as game_id, 'padel' as sport, 1 as sport_id, *  FROM public.padel_game pga 
                    WHERE pga.user_id = :userid  
                    AND pga.winner is null
                    ORDER BY pga.created_at desc";

        $stmt = $conn->executeQuery($sql, ['userid'=>$userid]);

        $resultSet = $stmt->fetchAllAssociative();

        return $resultSet;
    }

    public function getHistoryPadelGamesByUser($userid){
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT pga.id as game_id, *, AGE(pga.finished_at, pga.created_at) as duration, 1 as sport_id  FROM public.padel_game pga 
                    WHERE pga.user_id = :userid 
                    AND pga.winner is not null
                    ORDER BY pga.created_at desc";

        $stmt = $conn->executeQuery($sql, ['userid'=>$userid]);

        $resultSet = $stmt->fetchAllAssociative();

        return $resultSet;
    }

//    /**
//     * @return PadelGame[] Returns an array of PadelGame objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('g.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?PadelGame
//    {
//        return $this->createQueryBuilder('g')
//            ->andWhere('g.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
