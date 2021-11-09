<?php

namespace App\Controller\Admin;

use App\Entity\Product;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ProductCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Product::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des produits')
            ->setPageTitle('new', 'Créer un produit')
            ->setPageTitle('edit', 'Modifier un produit');
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
                ->setLabel('Nom du produit'),
            SlugField::new('slug')
                ->setTargetFieldName('name')
                ->setLabel('Slug'),
            ImageField::new('picture')
                ->setLabel('Photo du produit')
                ->setBasePath('uploads/product-photo')
                ->setUploadDir('public/uploads/product-photo')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            TextareaField::new('description')
                ->setLabel('Description du produit'),
            MoneyField::new('price')
                ->setRequired(true)
                ->setLabel('Prix du produit')
                ->setCurrency('EUR'),
            TextField::new('link')
                ->setLabel('Lien vers le produit')
                ->setRequired(true),
            BooleanField::new('isTrend')
        ];
    }
}
