<?php

namespace App\DataFixtures;


use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i=0; $i < 10 ; $i++) { 

  
        } 
        $manager->flush();
    }
}

