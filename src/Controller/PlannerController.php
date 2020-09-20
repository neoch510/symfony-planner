<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PlannerController extends AbstractController
{
    /**
     * @Route("/planner", name="planner")
     */
    public function index()
    {
        return $this->render('planner/index.html.twig', [
            'controller_name' => 'PlannerController',
        ]);
    }
}
