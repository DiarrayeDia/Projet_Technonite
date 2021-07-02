<?php

namespace App\Controller;

use App\Repository\ArtistRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgendaController extends AbstractController
{
    /**
     * @Route("/agenda", name="agenda")
     */
    public function index(ArtistRepository $artistRepository): Response
    {
        return $this->render('agenda/index.html.twig', [
            'controller_name' => 'AgendaController',
            'artistes' => $artistRepository->findAll(),
        ]);
    }
}
