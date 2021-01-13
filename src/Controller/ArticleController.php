<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/articles", name="articles_index")
     */
    public function index(ArticleRepository $repo): Response
    {   
        $articles = $repo->findAll();
        return $this->render('article/index.html.twig', [
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/articles/{slug}", name="article_show")
     */
    public function show($slug, ArticleRepository $repo): Response
    {   
        $article = $repo->findOneBySlug($slug);
        
        return $this->render('article/show.html.twig', [
            'article' => $article
        ]);
    }
}
