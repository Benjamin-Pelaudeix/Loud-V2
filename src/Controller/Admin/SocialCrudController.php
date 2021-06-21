<?php

namespace App\Controller\Admin;

use App\Entity\Social;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SocialCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Social::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name', 'Réseau social')
                ->setRequired(true),
            TextField::new('account_name', 'Nom du compte')
                ->setRequired(true),
            TextField::new('link', 'Lien')
                ->setRequired(true)
        ];
    }
}
