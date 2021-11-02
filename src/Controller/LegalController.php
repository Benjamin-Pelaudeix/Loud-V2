<?php

namespace App\Controller;

use App\Entity\Content;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalController extends AbstractController
{
    /**
     * LegalController constructor.
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/mentions-legales", name="legal")
     */
    public function index(): Response
    {
        $content = $this->entityManager->getRepository(Content::class)->findOneByName('mentions-legales');
        return $this->render('legal/index.html.twig', [
            'content' => $content
        ]);
    }
}
