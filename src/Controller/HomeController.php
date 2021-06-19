<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    private $entityManager;

    /**
     * HomeController constructor.
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        $bigNews = $this->entityManager->getRepository(News::class)->findBy(array('isImportant' => '= true'), array('createdAt' => 'DESC'), 1);
        $lastNews = $this->entityManager->getRepository(News::class)->findBy(array(), array('createdAt' => 'DESC'), 1);
        $threeLast = $this->entityManager->getRepository(News::class)->findBy(array(), array('createdAt' => 'DESC'), 2, 1);
        return $this->render('home/index.html.twig', [
            'bigNews' => $bigNews,
            'lastNews' => $lastNews[0],
            'threeLast' => $threeLast
        ]);
    }
}
