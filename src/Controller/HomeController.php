<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index(): Response
    {
        // je declare un name qui sera envoyé à la vue
        // et qui contient -> Page d'accueil- dans la vue j'utilise 
        // la var name
        return $this->render('home/index.html.twig', [
            'name' => 'HomeController',
        ]);
    }
}
