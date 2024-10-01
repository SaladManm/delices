<?php

namespace App\Controller;

use App\Form\AjoutBonbonType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BonbonController extends AbstractController
{
    #[Route('/ajoutBonbon', name: 'ajout_bonbon')]
    public function ajoutBonbon(Request $request): Response
    {
        $form = $this->createForm(AjoutBonbonType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $data = $form->getData();
            $this->addFlash('success', 'Le bonbon a bien été ajouté !');

            return $this->redirectToRoute('ajout_bonbon');
        }

        return $this->render('bonbon/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
