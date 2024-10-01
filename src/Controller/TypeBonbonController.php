<?php

namespace App\Controller;

use App\Entity\TypeBonbon;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TypeBonbonController extends AbstractController
{
    #[Route('/liste-type_bonbon', name: 'liste_typebonbon')]
    public function listeTypeBonbon(EntityManagerInterface $entityManager): Response
    {
        $bonbons = $entityManager->getRepository(TypeBonbon::class)->findBy([], []);

        
        return $this->render('type_bonbon/liste.html.twig', [
            'bonbons' => $bonbons,

        ]);
        
    }
}
