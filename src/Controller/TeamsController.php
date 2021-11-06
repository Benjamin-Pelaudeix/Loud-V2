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
     * @Route("/equipes/{slug}", name="teams")
     */
    public function index(string $slug): Response
    {
        $section = $this->entityManager->getRepository(Section::class)->findOneBySlug($slug);
        return $this->render('teams/index.html.twig', [
            'section' => $section
        ]);
    }
}
