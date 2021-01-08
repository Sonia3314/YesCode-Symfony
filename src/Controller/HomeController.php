<?php

namespace App\Controller;


use App\Entity\Fruit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(EntityManagerInterface $manager): Response
    {
        $banane = new Fruit();
        $fraise = new Fruit();

        $banane->setName("banane des Antilles");
        $fraise->setName("fraise des bois");

        
        //dit à doctrine que tu veux sauvegarder (éventuellement) le produit
        $manager->persist($banane);
        $manager->persist($fraise);

        // Un seul Flush pour tous les persist ! envoie ce qui est persist ou autre
        //mais on fait souvent un persist à la fois
        //execute les requetes 
        $manager->flush();
        //le tout se déclenche en actualisant la page 

        return $this->render('home/index.html.twig', []);

    }
}
