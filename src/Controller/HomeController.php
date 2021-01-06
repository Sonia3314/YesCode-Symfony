<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
        ]);
    }
    /**
     * @Route("/articles", name="articles_list")
     */
    public function articlesList(): Response
    {
        
        return $this->render('home/articles.list.html.twig', [
            
        ]);
    }
}





