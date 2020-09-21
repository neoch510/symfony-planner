<?php

namespace App\Controller;

use App\Form\PlannerFormType;
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
        $form = $this->createForm(PlannerFormType::class);
        return $this->render('panel/index.html.twig', [
            'controller_name' => 'PanelController',
            'form'=>$form->createView()
        ]);
    }
}
