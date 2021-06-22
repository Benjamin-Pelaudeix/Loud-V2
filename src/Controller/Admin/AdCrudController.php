<?php

namespace App\Controller\Admin;

use App\Entity\Ad;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class AdCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Ad::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des publicités')
            ->setPageTitle('new', 'Créer une publicité')
            ->setPageTitle('edit', 'Modifier une publicité');
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
            ImageField::new('banner', 'Publicité')
                ->setRequired(true)
                ->setBasePath('/uploads/ads-banner')
                ->setUploadDir('public/uploads/ads-banner')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextField::new('link', 'Lien')
                ->setRequired(true),
            BooleanField::new('isFirstPage', 'Afficher sur l\'accueil')
        ];
    }
}
