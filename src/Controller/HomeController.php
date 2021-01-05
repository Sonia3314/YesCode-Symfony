<?php

namespace App\Controller;

use stdClass;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        //ici on déclare un tableau
        $games = ["Starcraft 2", "BF6", "Metro Exodus", "Tekken 5", "Crash Bash"];


        return $this->render('home/index.html.twig', [
            'name' => 'Page d\'accueil',
            "games" => $games


        ]);
    }
}
