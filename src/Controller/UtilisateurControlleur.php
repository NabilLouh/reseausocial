<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Repository\CommentaireRepository;
use App\Repository\PublicationRepository;
use App\Repository\UtilisateurRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/utilisateur/create', name: 'app_utilisateur_create')]
    public function create(Request $request, ManagerRegistry $doctrine, EntityManagerInterface $manager)
    {
        $utilisateur = new Utilisateur();
        $form = $this->createForm(UtilisateurType::class, $utilisateur);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $manager->persist($utilisateur);
            $manager->flush();

            $this->addFlash('success', $utilisateur->getName().'a été créé');

            return $this->redirectToRoute('app_utilisateur_index');
        }
        return $this->render('utilisateur/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }


    #[Route(path:'/utilisateur/{name}', name: 'app_utilisateur_show')]
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