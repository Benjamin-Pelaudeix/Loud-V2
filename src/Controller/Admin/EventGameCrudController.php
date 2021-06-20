<?php

namespace App\Controller\Admin;

use App\Entity\EventGame;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventGameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventGame::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Jeu')
                ->setRequired(true),
            ImageField::new('logo', 'Logo')
                ->setRequired(true)
                ->setBasePath('/uploads/events/game-logo')
                ->setUploadDir('public/uploads/events/game-logo')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
        ];
    }
}
