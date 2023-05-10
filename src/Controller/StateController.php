<?php

namespace App\Controller;


use App\Entity\TypeState;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
// use Omines\DataTablesBundle\Adapter\Doctrine\ORMAdapter;

class StateController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="state_list")
     */
    public function states(): Response
    {
        $states  = $this->entityManager->getRepository(TypeState::class)->findAll();

        return $this->render('state/index.html.twig', [
            'states' => $states,
        ]);
    }

}

