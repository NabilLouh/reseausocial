<?php 

namespace App\Controller;


use App\Repository\PublicationRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class WelcomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(ManagerRegistry $doctrine, PublicationRepository $repository)
    {
        $publications = $repository->findAll();

        return $this->render('publication/index.html.twig', [
            'publications' => $publications,
        ]);
    }
}