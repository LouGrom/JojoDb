<?php

namespace App\Controller;

use App\Repository\CharacterRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CharacterController extends AbstractController
{
    /**
     * @Route("/character/{id}/view", name="character_view", requirements={"id" = "\d+"})
     */
    public function view(CharacterRepository $characterRepository, $id)
    {
        return $this->render('character/view.html.twig', ['character'=>$characterRepository->find($id)]);
    }
}
