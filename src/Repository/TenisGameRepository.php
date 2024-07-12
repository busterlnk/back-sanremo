<?php

namespace App\Repository;

use App\Entity\TenisGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TenisGame>
 *
 * @method TenisGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method TenisGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method TenisGame[]    findAll()
 * @method TenisGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TenisGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TenisGame::class);
    }


    public function getTenisGamesByUser($userid){
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT tga.id as game_id, 'tenis' as sport, 2 as sport_id, *  FROM public.tenis_game tga 
                    WHERE tga.user_id = :userid  
                    AND tga.winner is null
                    ORDER BY tga.created_at desc";

        $stmt = $conn->executeQuery($sql, ['userid'=>$userid]);

        $resultSet = $stmt->fetchAllAssociative();

        return $resultSet;
    }



    public function getHistoryTenisGamesByUser($userid){
        $conn = $this->getEntityManager()->getConnection();

        $sql = "SELECT tga.id as game_id, *, AGE(tga.finished_at, tga.created_at) as duration  FROM public.tenis_game tga 
                    WHERE tga.user_id = :userid 
                    AND tga.winner is not null
                    ORDER BY tga.created_at desc";

        $stmt = $conn->executeQuery($sql, ['userid'=>$userid]);

        $resultSet = $stmt->fetchAllAssociative();

        return $resultSet;
    }

//    /**
//     * @return TenisGame[] Returns an array of TenisGame objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TenisGame
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
