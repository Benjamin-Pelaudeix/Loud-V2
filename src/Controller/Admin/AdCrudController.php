<?php

namespace App\Controller\Admin;

use App\Entity\Ad;
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
