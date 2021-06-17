<?php

namespace App\Controller;

use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsDetailController extends AbstractController
{

    private $entityManager;

    /**
     * NewsDetailController constructor.
     * @param \Doctrine\ORM\EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/actualites/{slug}", name="news_detail")
     */
    public function index($slug): Response
    {

        $news = $this->entityManager->getRepository(News::class)->findOneBySlug($slug);

        return $this->render('news_detail/index.html.twig', [
            'news' => $news
        ]);
    }
}
