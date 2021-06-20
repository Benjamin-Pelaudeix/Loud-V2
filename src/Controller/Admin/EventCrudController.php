<?php

namespace App\Controller\Admin;

use App\Entity\Event;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
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
            SlugField::new('slug', 'Slug')
                ->setRequired(true)
                ->setTargetFieldName('name'),
            ImageField::new('logo', 'Logo')
                ->setRequired(true)
                ->setBasePath('/uploads/events/logo')
                ->setUploadDir('/public/uploads/events/logo')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            AssociationField::new('game', 'Jeu')
                ->setRequired(true),
            TextEditorField::new('description', 'Description')
                ->setRequired(true),
            TextField::new('twitterLink', 'Lien vers Twitter'),
            TextField::new('tournamentLink', 'Lien vers Tournoi')
                ->setRequired(true)
        ];
    }
}
