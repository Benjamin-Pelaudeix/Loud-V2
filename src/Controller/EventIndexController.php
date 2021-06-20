<?php

namespace App\Controller;

use App\Entity\Content;
use App\Entity\Event;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EventIndexController extends AbstractController
{

    private $entityManager;

    /**
     * EventIndexController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/tournois", name="event_index")
     */
    public function index(): Response
    {
        $events = $this->entityManager->getRepository(Event::class)->findAll();
        $eventsContent = $this->entityManager->getRepository(Content::class)->findOneByName('tournament-presentation');
        return $this->render('event_index/index.html.twig', [
            'events' => $events,
            'tournamentPresentation' => $eventsContent
        ]);
    }
}
