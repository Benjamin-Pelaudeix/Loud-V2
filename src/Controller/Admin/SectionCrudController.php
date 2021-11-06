<?php

namespace App\Controller\Admin;

use App\Entity\Section;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SectionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Section::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des sections')
            ->setPageTitle('new', 'Créer une section')
            ->setPageTitle('edit', 'Modifier une section');
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
            TextField::new('name', 'Libellé'),
            SlugField::new('slug', 'Slug')
                ->setRequired(true)
                ->setTargetFieldName('name'),
            TextareaField::new('description', 'Description'),
            ImageField::new('logotype', 'Logo')
                ->setBasePath('uploads/sections-logo')
                ->setUploadDir('public/uploads/sections-logo')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
        ];
    }
}
