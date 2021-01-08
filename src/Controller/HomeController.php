<?php

namespace App\Controller;


use App\Entity\Fruit;
use App\Repository\FruitRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home_page")
     */
    public function index(FruitRepository $fruitRepository): Response
    {
        $fruits = $fruitRepository->findAll();
        dump($fruits);

        return $this->render('home/index.html.twig', [
            "fruits"=> $fruits

        ]);

    }
}
