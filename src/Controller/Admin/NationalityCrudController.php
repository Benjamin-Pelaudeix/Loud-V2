<?php

namespace App\Controller\Admin;

use App\Entity\Nationality;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class NationalityCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Nationality::class;
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
