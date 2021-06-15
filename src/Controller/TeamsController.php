<?php

namespace App\Controller;

use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TeamsController extends AbstractController
{

    private $entityManager;

    /**
     * TeamsController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/equipes", name="teams")
     */
    public function index(): Response
    {
        $sections = $this->entityManager->getRepository(Section::class)->findBy(array(), array(), null, 4);
        return $this->render('teams/index.html.twig', [
            'sections' => $sections
        ]);
    }
}
