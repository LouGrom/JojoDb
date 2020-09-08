<?php

namespace App\Controller;

use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepage(SeasonRepository $seasonRepository)
    {
        return $this->render('default/homepage.html.twig', ['seasons'=>$seasonRepository->findAll()]);
    }
}
