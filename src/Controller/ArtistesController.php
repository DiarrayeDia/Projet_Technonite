<?php

namespace App\Controller;

use App\Entity\Artist;
use App\Repository\ArtistRepository;
use App\Repository\CategoryRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtistesController extends AbstractController
{
    /**
     * @Route("/artistes", name="artistes")
     * @Route("/artistes/category/{id}", name="liste_categoryById", requirements={"id"="\d+"})
     */
    public function index(CategoryRepository $categorieRepository, ArtistRepository $artistRepository, $id = null): Response
    {
        $categories = $categorieRepository->findAll();

        $artistes = $id ? $artistRepository->findBy(['category' => $id]) :  $artistRepository->findAll();
        $categoryColorName = [
            'Mélodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Détroit' => 'warning',
        ];
        foreach ($categories as $category) {
            $category->color = $categoryColorName[$category->getName()];
        }

        // dd($categories);
        return $this->render('artistes/index.html.twig', [
            'categories' => $categories,
            'artistes' => $artistes,
        ]);
    }

    /**
     * @Route("/artistes/view/{id}", name="artiste_view", requirements={"id"="\d+"})
     */
    public function view(Artist $artist, ArtistRepository $artistRepository): Response
    {
        $artistId = $artist->getId();
        $artiste = $artistRepository->find($artistId);

        return $this->render('artistes/view.html.twig', [
            'artiste' => $artiste,
        ]);
    }
}
