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
        // je déclare une variable php de type string 
        $author= "Loïs Lane";

        // J'instancie un objet standard PHP sans class fait pas nous meme
        // Je n'oublie pas l'import | NameSpaceResolver -> plugin
        $article = new stdClass();
        // J'attribue des proprietes à mon objet
        $article->title = "Théorie du complot";
        $article->intro = "Fascine depuis des lustres ! on vous dit tout";
        $article->content = "Blabla, Po po po , papa papa bla bla";

        // J'instancie un autre objet
        $michel = new stdClass();
        $michel->name = "Michel";
        $michel->age = 58;

        $outkast = "JD3000";
        $picture = "";
        // Je file tout ça à ma vue pour l'afficher !
        return $this->render('home/index.html.twig', [
            'name' => 'Page d\'accueil',
            "article" => $article,
            "auteur"  => $author,
            "user"    => $michel,
            "jeanDaniel" =>  $outkast
            
        ]);
    }
}
