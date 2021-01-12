<?php

namespace App\DataFixtures;


use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i <= 10 ; $i++) { 

            $article = new Article();
            $article->setTitle("Article n° ". $i);

            $article->setIntro('ceci est une super intro');

            $article->setContent('<p>Blablabla 1
            </p><p>Blablabla 2</p>
            <p>Blablabla 3</p>');

            $article->setImage("https://media.cdnws.com/_i/85346/285/2264/87/blog.jpeg");
            $article->setCreatedAt(new \DateTime());
            $manager->persist($article);



        } 
        $manager->flush();
    }
}

