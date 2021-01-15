<?php

namespace App\DataFixtures;

use Faker;
use App\Entity\User;
use App\Entity\Article;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create('fr_FR');

    // GESTION DES USERS - création de faux utlisateurs

        $users = [];

        $genres = ['male', 'female'];

        for ($i=0; $i <= 20 ; $i++) { 
            $user = new User();

            $genre = $faker->randomElement($genres);

            $picture = 'https://randomuser.me/api/portraits/';
            $pictureId = $faker->numberBetween(1,99) . '.jpg';
            
            $picture .= ($genre == 'male' ? 'men/' : 'women/').$pictureId;

            $user->setFirstname($faker->firstname($genre))
                 ->setLastname($faker->lastname)
                 ->setEmail($faker->email)
                 ->setAvatar($picture)
                 ->setPresentation($faker->sentence())
                 ->setHash("password");
        
            $manager->persist($user);
            //Ici je charge mon tableau
            $users[] = $user;
      
        }

        // GESTION DES ARTICLES

        for ($i=0; $i <=20 ; $i++) { 
            
            $article = new Article();
            
            $title = $faker->sentence(2);

            $image = "https://picsum.photos/400/300";

            $intro = $faker->paragraph(2);

            $content = '<p>' . implode('</p><p>',$faker->paragraphs(5)) . '</p>';

            //J'utilise mes users pour en prendre au hasard 
            $author= $users[mt_rand(0, count($users) -1)];

            $article->setTitle($title)
                    ->setImage($image)
                    ->setIntro($intro)
                    ->setContent($content)
                    ->setAuthor($author);

            $manager->persist($article);
            }

        $manager->flush();

        


    }

}
