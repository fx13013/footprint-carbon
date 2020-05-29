<?php

namespace App\Controller;

use App\Repository\FootprintRepository;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function home(FootprintRepository $footprint)
    {
        $allSelect = $footprint->findAll();

        return $this->render('home/homepage.html.twig', [
            'allSelect' => $allSelect
        ]);
    }
}
