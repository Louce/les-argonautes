<?php

namespace App\Controller;

use App\Entity\Argonautes;
use App\Form\AddArgonauteType;
use App\Repository\ArgonautesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController {
    /**
     * @Route("/", name="main_home")
     */
    public function home() {
        return $this->render('main/home.html.twig');
    }
}