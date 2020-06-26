<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LignefraisforfaitController extends AbstractController
{
    /**
     * @Route("/lignefraisforfait", name="lignefraisforfait")
     */
    public function index()
    {
        return $this->render('lignefraisforfait/index.html.twig', [
            'controller_name' => 'LignefraisforfaitController',
        ]);
    }
}
