<?php
namespace App\Controller;

use Faker;
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
        
        $articles = $repo->findLastArticles(7);
        $faker = Faker\Factory::create('fr_FR');
        // $title = $faker->sentence(2);
        // $intro = $faker-> paragraph(2);

        // $contenu = ["pomme","poire","figue","grenade","fraise"];



        $content = '<p>' . implode('</p><p>' , $faker->paragraphs(7) ) . '</p>'; 
        $createdAt = $faker->dateTimeBetween('- 3 months');

        dump($createdAt);
        dump($faker->paragraphs(7));// renvoie un array de 7 paragraphes

        $image = "https://picsum.photos/400/300";

        return $this->render('home/index.html.twig', [
        "articles"=> $articles,
        "image" => $image,
        "content" => $content

        ]);

    }
}
