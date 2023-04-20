<?php

namespace App\Controller;

use App\Repository\CategoryRepository;
use App\Repository\NoteRepository;
use App\Repository\ResourceRepository;
use App\Service\NewsPaper;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home', methods: ['GET'])]
    public function index(
        NoteRepository $note, 
        CategoryRepository $category, 
        NewsPaper $news
        ): Response
        {

        return $this->render('page/home.html.twig', [
            'controller_name' => 'Accueil',

            // Récupration des 6 dernières notes
            'note' => $note->findBy(
                [],
                ['id' => 'DESC'],
                9
            ),

            // Récupération de toutes les catégories
            'category' => $category->findAll()
        ]);

    }

    #[Route('/notes', name: 'notes', methods: ['GET'])]
    public function notes(NoteRepository $note): Response
    {
        return $this->render('page/notes.html.twig', [
            'note' => $note->findBy(
                [],
                ['id' => 'DESC']
            )
        ]);
    }

    #[Route('/categories', name: 'categories', methods: ['GET'])]
    public function categories(CategoryRepository $category, NoteRepository $note): Response
    {
        return $this->render('page/categories.html.twig', [
            'category' => $category->findBy(
                [],
                ['id' => 'ASC']
            ),
            'note' => $note->findBy(
                [],
                ['id' => 'ASC'],
                3
            )
        ]);
    }

    // TODO: Créer une route pour afficher les ressources
    #[Route('/ressources', name: 'resources', methods: ['GET'])]
    public function resources(ResourceRepository $resource): Response
    {
        return $this->render('page/ressources.html.twig', [
            'resource' => $resource->findBy(
                [],
                ['id' => 'DESC']
            )
        ]);
    }

    // TODO: Créer une route pour afficher les news
    #[Route('/veille', name: 'news', methods: ['GET'])]
    public function news(NewsPaper $newsPaper): Response
    {

        return $this->render('page/news.html.twig', [
            'news' => $newsPaper -> getNews('technology'),

        ]);
    }
}
