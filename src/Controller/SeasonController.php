<?php

namespace App\Controller;

use App\Repository\SeasonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SeasonController extends AbstractController
{
    /**
     * @Route("/season/{id}/view", name="season_view", requirements={"id" = "\d+"})
     */
    public function view(SeasonRepository $seasonRepository, $id)
    {
        return $this->render('season/view.html.twig', ['season'=>$seasonRepository->find($id)]);
    }
}
