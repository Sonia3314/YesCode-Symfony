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
        $games = [
            "Starcraft 2" => 8,
            "BF6" => 128,
            "Metro Exodus" => 1,
            "Tekken 5" => 2,
            "Crash Bash" => 4 
        ];


        return $this->render('home/index.html.twig', [
            'name' => 'Page d\'accueil',
            "games" => $games


        ]);
    }
}
