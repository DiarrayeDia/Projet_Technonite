<?php

namespace App\Controller;

use App\Form\ReservationType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReservationController extends AbstractController
{
    /**
     * @Route("/reservation", name="reservation")
     */
    public function index(): Response
    {

        $form = $this->createForm(ReservationType::class);

        return $this->render('reservation/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
