<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use SebastianBergmann\CodeCoverage\Report\Text;

class EventCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Event::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Nom')
                ->setRequired(true),
            ImageField::new('logo', 'Logo')
                ->setRequired(true)
                ->setBasePath('/uploads/events/logo')
                ->setUploadDir('/public/uploads/events/logo')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            ImageField::new('banner', 'Bannière')
                ->setBasePath('/uploads/events/banner')
                ->setUploadDir('/public/uploads/events/banner')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('twitterLink', 'Lien vers Twitter'),
            TextField::new('tournamentLink', 'Lien vers Tournoi')
                ->setRequired(true)
        ];
    }
}
