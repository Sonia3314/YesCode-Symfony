<?php

namespace App\DataFixtures;

use App\Entity\Fruit;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 10 ; $i++) { 

            $fruit = new Fruit();
            $fruit->setName("Fruit numero =>" . $i);
            $manager->persist($fruit);
        } 
        $manager->flush();
    }
}

