<?php

namespace App\Controller;

use App\Entity\PadelGame;
use App\Entity\Sport;
use App\Entity\User;
use App\Repository\PadelGameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class GamesController extends AbstractController
{

    #[Route('/api/games_user', methods: ['POST'])]
    public function getGamesByUser(Request $request, PadelGameRepository $gameRepository):JsonResponse{
        $userid = $request->get('userid');
        $sportid = $request->get('sportid');
        $response = $gameRepository->getGamesByUser($userid, $sportid);

        if(!empty($response)){
            return new JsonResponse($response, 200);

        }else{
            return new JsonResponse(['success' => false], 202);
        }
    }


    #[Route('/api/history/games_user', methods: ['POST'])]
    public function getHistoryGamesByUser(Request $request, PadelGameRepository $gameRepository):JsonResponse{
        $userid = $request->get('userid');
        $sportid = $request->get('sportid');
        $response = $gameRepository->getHistoryGamesByUser($userid, $sportid);

        if(!empty($response)){
            return new JsonResponse($response, 200);

        }else{
            return new JsonResponse(['success' => false], 202);
        }
    }
}