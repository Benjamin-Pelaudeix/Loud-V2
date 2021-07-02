<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\News;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class NewsIndexController extends AbstractController
{

    private $entityManager;

    /**
     * NewsIndexController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/actualites", name="news_index")
     */
    public function index(): Response
    {
        $news = $this->entityManager->getRepository(News::class)->findBy(array(), array('createdAt' => 'DESC'), 30);
        return $this->render('news_index/index.html.twig', [
            'news' => $news
        ]);
    }
}
