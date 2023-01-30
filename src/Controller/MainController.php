<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {
    /**
     * @Route("/", name="main_home")
     */
    public function home() {
        return $this->render('main/home.html.twig');
    }

    /**
     * @Route("/equipe", name="main_crew")
     */
    public function crew() {
        return $this->render('main/crew.html.twig');
    }
}