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

class PadelGamesController extends AbstractController
{

    #[Route('/api/padel/create_game', methods: ['POST'])]
    public function createNewGame(Request $request, EntityManagerInterface $entityManager):JsonResponse{
        $userid = $entityManager->getRepository(User::class)->find($request->get('userid'));
        $sportid = $entityManager->getRepository(Sport::class)->find($request->get('sportid'));

        $padelGame = new PadelGame();
        $padelGame->setSport($sportid);
        $padelGame->setUser($userid);
        $padelGame->setPlayerOne($request->get('player_one'));
        $padelGame->setPlayerTwo($request->get('player_two'));
        $padelGame->setIndividual($request->get('individual'));
        $padelGame->setMode($request->get('mode'));
        $padelGame->setSaque(1);
        $padelGame->setCreatedAt(date_create_immutable());
        $entityManager->persist($padelGame);
        $entityManager->flush();

        return new JsonResponse(['id' => $padelGame->getId()], 200);
    }

    #[Route('/api/padel/reset_game', methods: ['POST'])]
    public function resetGame(Request $request, EntityManagerInterface $entityManager):JsonResponse{
        $padelGame = $entityManager->getRepository(PadelGame::class)->find($request->get('gameid'));

        $padelGame->setSaque(1);
        $padelGame->setWinner(null);
        $padelGame->setP1ps(null);
        $padelGame->setP11s(null);
        $padelGame->setP12s(null);
        $padelGame->setP13s(null);
        $padelGame->setP2ps(null);
        $padelGame->setP21s(null);
        $padelGame->setP22s(null);
        $padelGame->setP23s(null);
        $entityManager->persist($padelGame);
        $entityManager->flush();

        return new JsonResponse(['success' => true], 200);
    }

    #[Route('/api/padel/set_winner', methods: ['POST'])]
    public function set_winner(Request $request, EntityManagerInterface $entityManager):JsonResponse{
        $padelGame = $entityManager->getRepository(PadelGame::class)->find($request->get('gameid'));

        $padelGame->setP1ps(null);
        $padelGame->setP2ps(null);
        $padelGame->setWinner($request->get('winner'));
        $padelGame->setFinishedAt(date_create_immutable());
        $entityManager->persist($padelGame);
        $entityManager->flush();

        return new JsonResponse(['success' => true], 200);
    }
}