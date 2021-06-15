<?php

namespace App\Controller\Admin;

use App\Entity\Member;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MemberCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Member::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des membres')
            ->setPageTitle('new', 'Créer un membre')
            ->setPageTitle('edit', 'Modifier un membre');
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('gamename', 'Pseudo'),
            TextField::new('firstname', 'Prénom'),
            TextField::new('lastname', 'Nom'),
            AssociationField::new('nationality', 'Nationalité')
                ->setRequired(true),
            AssociationField::new('section', 'Section')
                ->setRequired(true),
            AssociationField::new('role', 'Rôle')
                ->setRequired(true),
            ImageField::new('photo', 'Photo')
                ->setBasePath('uploads/')
                ->setUploadDir('public/uploads/')
                ->setUploadedFileNamePattern('[randomhash].[extension]')
                ->setRequired(false),
            TextField::new('twitter', 'Lien vers Twitter'),
            TextField::new('twitch', 'Lien vers Twitch'),
            TextField::new('email', 'Adresse email'),
            TextField::new('discord', 'Nom Discord'),
        ];
    }
}
