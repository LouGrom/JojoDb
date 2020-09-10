<?php

namespace App\Controller;

use App\Entity\Stand;
use App\Form\StandType;
use App\Repository\StandRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stand")
 */
class StandController extends AbstractController
{
    /**
     * @Route("/", name="stand_list", methods={"GET"})
     */
    public function list(StandRepository $standRepository): Response
    {
        return $this->render('stand/list.html.twig', [
            'stands' => $standRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="stand_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stand = new Stand();
        $form = $this->createForm(StandType::class, $stand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stand);
            $entityManager->flush();

            $this->addFlash("success", "Le stand a bien été ajouté");

            return $this->redirectToRoute('stand_list');
        }

        return $this->render('stand/new.html.twig', [
            'stand' => $stand,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stand_show", methods={"GET"})
     */
    public function show(Stand $stand): Response
    {
        return $this->render('stand/show.html.twig', [
            'stand' => $stand,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="stand_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Stand $stand): Response
    {
        $form = $this->createForm(StandType::class, $stand);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            $this->addFlash("success", "Le stand a bien été modifié");

            return $this->redirectToRoute('stand_list');
        }

        return $this->render('stand/edit.html.twig', [
            'stand' => $stand,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stand_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Stand $stand): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stand->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stand);
            $entityManager->flush();

            $this->addFlash("success", "Le stand a bien été supprimé");
        }

        return $this->redirectToRoute('stand_list');
    }
}
