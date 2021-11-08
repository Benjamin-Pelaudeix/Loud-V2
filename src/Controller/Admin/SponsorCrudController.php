<?php

namespace App\Controller\Admin;

use App\Entity\Sponsor;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SponsorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sponsor::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des sponsors')
            ->setPageTitle('new', 'Ajouter un sponsor')
            ->setPageTitle('edit', 'Modifier un sponsor');
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->update(Crud::PAGE_INDEX, Action::NEW, function (Action $action) {
                return $action->setIcon('fas fa-plus')->setLabel('Créer');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action->setIcon('fas fa-pen')->setLabel(false);
            })
            ->update(Crud::PAGE_INDEX, Action::DELETE, function (Action $action) {
                return $action->setIcon('fas fa-trash')->setLabel(false);
            });
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')
                ->setRequired(true)
                ->setLabel('Nom'),
            TextareaField::new('description')
                ->setRequired(true)
                ->setLabel('Description'),
            ImageField::new('logotype')
                ->setRequired(true)
                ->setLabel('Logo')
                ->setBasePath('uploads/sponsors-logo')
                ->setUploadDir('public/uploads/sponsors-logo')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('link')
                ->setRequired(true)
                ->setLabel('Lien vers le site')
        ];
    }
}
