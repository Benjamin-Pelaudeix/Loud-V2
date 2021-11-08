<?php

namespace App\Controller;

use App\Entity\Sponsor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SponsorController extends AbstractController
{

    private $entityManager;

    /**
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    #[Route('/sponsors', name: 'sponsor')]
    public function index(): Response
    {
        $sponsors = $this->entityManager->getRepository(Sponsor::class)->findAll();
        return $this->render('sponsor/index.html.twig', [
            'sponsors' => $sponsors
        ]);
    }
}
