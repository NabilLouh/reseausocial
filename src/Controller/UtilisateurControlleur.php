<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UtilisateurControlleur extends AbstractController
{
    #[Route(path: '/utilisateur', name: 'app_utilisateur_index')]
    public function index(ManagerRegistry $doctrine, UtilisateurRepository $repository)
    {
        $utilisateurs = $repository->findAll();

        return $this->render('utilisateur/index.html.twig', [
            'utilisateurs' => $utilisateurs,
        ]);
    }

    #[Route(path:'/utilisteur/{name}', name: 'app_utilisateur_show')]
    public function show(UtilisateurRepository $repository, Utilisateur $utilisateur, CommentaireRepository $repositorycom, PublicationRepository $repositorypubli)
    {
        $commentaires = $repositorycom->findAll();
        $publications = $repositorypubli->findAll();

        return $this->render('utilisateur/show.html.twig', [
            'utilisateur' => $utilisateur,
            'commentaires' => $commentaires,
            'publications' => $publications,
        ]);
    }
}