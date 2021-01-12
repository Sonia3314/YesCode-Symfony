<?php

namespace App\Controller;

use Faker;
use Cocur\Slugify\Slugify;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(ArticleRepository $repo): Response
    {    
        
        $articles = $repo->findLastArticles(3);
        
        $slugify = new Slugify();

        $title = "La théorie des cordes à Linges Gravitationnelles";

        $slug = $slugify->slugify($title);

        dump($slug);

        $faker = Faker\Factory::create('fr_FR');

        // $title = $faker->sentence(2);

        // $intro = $faker->paragraph(2);

        // $contenu = ["pomme", "poire", "figue", "grenade", "test"];

        $content = "<p>" . implode("</p><p>" , $faker->paragraphs(7) ) . "</p>";

        $createdAt =  $faker->dateTimeBetween('- 3 months') ;

        dump( $createdAt );

        $image = "https://picsum.photos/400/300";
        
        return $this->render('home/index.html.twig', [
            "articles" => $articles,
            "image" => $image,
            "content" => $content
        ]);
    }
}