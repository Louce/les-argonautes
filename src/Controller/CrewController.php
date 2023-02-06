<?php

namespace App\Controller;

use App\Entity\Argonautes;
use App\Form\AddArgonauteType;
use App\Repository\ArgonautesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CrewController extends AbstractController {

    /**
     * @Route("/equipe", name="app_crew")
     */
    public function list(ArgonautesRepository $argonautesRepository, Request $request, EntityManagerInterface $entityManager): Response {
        //récupère tous les argonautes de la table
        $argonautes = $argonautesRepository->findAll();

        //formulaire d'ajout
        $argonaute = new Argonautes();
        $argonautesForm = $this->createForm(AddArgonauteType::class, $argonaute);
        $argonautesForm->handleRequest($request);
        if ($argonautesForm->isSubmitted() && $argonautesForm->isValid()) {
            $entityManager->persist($argonaute);
            $entityManager->flush();
            $this->addFlash('success', 'Argonaute bien ajouté•e !');
            return $this->redirectToRoute('app_crew');
        }

        return $this->render('crew/crew.html.twig', ["argonautes" => $argonautes, "argonautesForm" => $argonautesForm->createView()]);
    }
}
