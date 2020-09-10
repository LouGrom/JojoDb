<?php

namespace App\Controller;

use App\Repository\StandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StandController extends AbstractController
{
    /**
     * @Route("/stands", name="stands_list")
     */
    public function list(StandRepository $standRepository)
    {
        return $this->render('stand/list.html.twig', ['stands'=>$standRepository->findAll()]);
    }
}
