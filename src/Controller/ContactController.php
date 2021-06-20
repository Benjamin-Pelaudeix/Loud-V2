<?php

namespace App\Controller;

use App\Entity\Content;
use App\Entity\Social;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{

    private $entityManager;

    /**
     * ContactController constructor.
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /**
     * @Route("/contact", name="contact")
     */
    public function index(): Response
    {
        $socials = $this->entityManager->getRepository(Social::class)->findAll();
        $contactContent = $this->entityManager->getRepository(Content::class)->findOneByName('contact-presentation');
        return $this->render('contact/index.html.twig', [
            'socials' => $socials,
            'contactPresentation' => $contactContent
        ]);
    }
}
