<?php

namespace App\Controller;

use App\Entity\Section;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HistoryController extends AbstractController
{

    private $entityManager;

    /**
     * HistoryController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/histoire", name="history")
     */
    public function index(): Response
    {
        $sections = $this->entityManager->getRepository(Section::class)->findBy(array(), array(), 4);
        return $this->render('history/index.html.twig', [
            'sections' => $sections
        ]);
    }
}
