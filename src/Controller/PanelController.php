<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PanelController extends AbstractController
{
    /**
     * @Route("/panel", name="panel")
     */
    public function index()
    {
        return $this->render('panel/index.html.twig', [
            'controller_name' => 'PanelController',
        ]);
    }
}
