<?php

namespace App\Controller\Admin;

use App\Entity\Nationality;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NationalityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Nationality::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des nationalités')
            ->setPageTitle('new', 'Créer une nationalité')
            ->setPageTitle('edit', 'Modifier une nationalité');
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
            TextField::new('countryname', 'Nationalité'),
            ImageField::new('flag', 'Drapeau')
                ->setBasePath('flags/')
                ->setUploadDir('public/assets/img/flags')
                ->setUploadedFileNamePattern('[slug].[extension]')
        ];
    }
}
