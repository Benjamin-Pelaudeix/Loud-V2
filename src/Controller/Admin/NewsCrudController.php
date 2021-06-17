<?php

namespace App\Controller\Admin;

use App\Entity\News;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return News::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title', 'Titre')
                ->setRequired(true),
            SlugField::new('slug', 'Slug')
                ->setTargetFieldName('title'),
            TextEditorField::new('body', 'Contenu')
                ->setRequired(true),
            ImageField::new('photo', 'Photo')
                ->setRequired(true)
                ->setBasePath('uploads/article-photo')
                ->setUploadDir('public/uploads/article-photo')
                ->setUploadedFileNamePattern('[randomhash].[extension]'),
            AssociationField::new('category', 'Catégories')
                ->setRequired(true),
            AssociationField::new('author', 'Auteur')
                ->setRequired(true),
            BooleanField::new('isImportant', 'Afficher sur l\'accueil')
                ->setRequired(true),
            DateTimeField::new('createdAt', 'Créé le')
                ->setRequired(true)
                ->setTimezone('Europe/Paris')
        ];
    }
}
