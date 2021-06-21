<?php

namespace App\Controller;

use App\Entity\Ad;
use App\Entity\News;
use App\Entity\Social;
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
        $bigNews = $this->entityManager->getRepository(Ad::class)->findBy(array('isFirstPage' => '= 1'), null, 1);
        $lastNews = $this->entityManager->getRepository(News::class)->findBy(array(), array('createdAt' => 'DESC'), 1);
        $threeLast = $this->entityManager->getRepository(News::class)->findBy(array(), array('createdAt' => 'DESC'), 3, 1);
        $socials = $this->entityManager->getRepository(Social::class)->findAll();
        return $this->render('home/index.html.twig', [
            'bigNews' => $bigNews,
            'lastNews' => $lastNews[0],
            'lastThree' => $threeLast,
            'socials' => $socials
        ]);
    }
}
