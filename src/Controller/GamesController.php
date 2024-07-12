<?php

namespace App\Controller;

use App\Entity\PadelGame;
use App\Entity\User;
use App\Repository\PadelGameRepository;
use App\Repository\TenisGameRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class GamesController extends AbstractController
{

    #[Route('/api/padel_games_user', methods: ['POST'])]
    public function getPadelGamesByUser(Request $request, PadelGameRepository $gameRepository):JsonResponse{
        $userid = $request->get('userid');
        $response = $gameRepository->getPadelGamesByUser($userid);

        if(!empty($response)){
            return new JsonResponse($response, 200);

        }else{
            return new JsonResponse(['success' => false], 202);
        }
    }

    #[Route('/api/tenis_games_user', methods: ['POST'])]
    public function getTenisGamesByUser(Request $request, TenisGameRepository $gameRepository):JsonResponse{
        $userid = $request->get('userid');
        $response = $gameRepository->getTenisGamesByUser($userid);

        if(!empty($response)){
            return new JsonResponse($response, 200);

        }else{
            return new JsonResponse(['success' => false], 202);
        }
    }

    #[Route('/api/history/padel_games_user', methods: ['POST'])]
    public function getHistoryPadelGamesByUser(Request $request, PadelGameRepository $gameRepository):JsonResponse{
        $userid = $request->get('userid');
        $response = $gameRepository->getHistoryPadelGamesByUser($userid);

        if(!empty($response)){
            return new JsonResponse($response, 200);

        }else{
            return new JsonResponse(['success' => false], 202);
        }
    }

    #[Route('/api/history/tenis_games_user', methods: ['POST'])]
    public function getHistoryTenisGamesByUser(Request $request, TenisGameRepository $gameRepository):JsonResponse{
        $userid = $request->get('userid');
        $response = $gameRepository->getHistoryTenisGamesByUser($userid);

        if(!empty($response)){
            return new JsonResponse($response, 200);

        }else{
            return new JsonResponse(['success' => false], 202);
        }
    }
}