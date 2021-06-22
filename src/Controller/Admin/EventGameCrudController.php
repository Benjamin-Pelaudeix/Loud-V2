<?php

namespace App\Controller\Admin;

use App\Entity\EventGame;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class EventGameCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return EventGame::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des jeux pour évènements')
            ->setPageTitle('new', 'Créer un jeu pour évènements')
            ->setPageTitle('edit', 'Modifier un jeu pour évènements');
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
