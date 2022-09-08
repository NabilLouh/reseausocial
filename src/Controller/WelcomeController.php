<?php 

namespace App\Controller;

use App\Entity\Publication;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(ManagerRegistry $doctrine, PublicationRepository $repository,CommentaireRepository $repositorycom )
    {
        $publications = $repository->findAll();
        $commentaires = $repositorycom->findAll();

        return $this->render('publication/index.html.twig', [
            'publications' => $publications,
            'commentaires' => $commentaires,
        ]);
    }

    #[Route(path: '/publication/{id}', name: 'app_publication_show')]
    public function show(PublicationRepository $repository, Publication $publication, CommentaireRepository $repositorycom)
    {
        $commentaires = $repositorycom->findAll();

        return $this->render('publication/show.html.twig', [
            'publication' => $publication,
            'commentaires' => $commentaires,
        ]);
    }
}