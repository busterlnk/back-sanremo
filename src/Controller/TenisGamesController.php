<?php

namespace App\Controller;

use App\Entity\TenisGame;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

class TenisGamesController extends AbstractController
{

    #[Route('/api/tenis/create_game', methods: ['POST'])]
    public function createNewGame(Request $request, EntityManagerInterface $entityManager):JsonResponse{
        $userid = $entityManager->getRepository(User::class)->find($request->get('userid'));

        $tenisGame = new TenisGame();
        $tenisGame->setUser($userid);
        $tenisGame->setPlayerOne($request->get('player_one'));
        $tenisGame->setPlayerTwo($request->get('player_two'));
        $tenisGame->setIndividual($request->get('individual'));
        $tenisGame->setSaque(1);
        $tenisGame->setCreatedAt(date_create_immutable());
        $entityManager->persist($tenisGame);
        $entityManager->flush();

        return new JsonResponse(['id' => $tenisGame->getId()], 200);
    }

    #[Route('/api/tenis/reset_game', methods: ['POST'])]
    public function resetGame(Request $request, EntityManagerInterface $entityManager):JsonResponse{
        $tenisGame = $entityManager->getRepository(TenisGame::class)->find($request->get('gameid'));

        $tenisGame->setSaque(1);
        $tenisGame->setWinner(null);
        $tenisGame->setP1ps(null);
        $tenisGame->setP11s(null);
        $tenisGame->setP12s(null);
        $tenisGame->setP13s(null);
        $tenisGame->setP2ps(null);
        $tenisGame->setP21s(null);
        $tenisGame->setP22s(null);
        $tenisGame->setP23s(null);
        $entityManager->persist($tenisGame);
        $entityManager->flush();

        return new JsonResponse(['success' => true], 200);
    }

    #[Route('/api/tenis/set_winner', methods: ['POST'])]
    public function set_winner(Request $request, EntityManagerInterface $entityManager):JsonResponse{
        $tenisGame = $entityManager->getRepository(TenisGame::class)->find($request->get('gameid'));

        $tenisGame->setP1ps(null);
        $tenisGame->setP2ps(null);
        $tenisGame->setWinner($request->get('winner'));
        $tenisGame->setFinishedAt(date_create_immutable());
        $entityManager->persist($tenisGame);
        $entityManager->flush();

        return new JsonResponse(['success' => true], 200);
    }
}