<?php

namespace App\Controller\Admin;

use App\Entity\Administrator;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class AdministratorCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Administrator::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Gestion des comptes Administrateur')
            ->setPageTitle('new', 'Créer un compte Administrateur')
            ->setPageTitle('edit','Modifier un compte Administrateur');
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
            TextField::new('login', 'Login')
                ->setRequired(true),
            TextField::new('password', 'Mot de passe')
                ->setRequired(true)
                ->setFormType(PasswordType::class),
            ChoiceField::new('roles', 'Rôles')
                ->setChoices([
                    'Global' => 'ROLE_GLOBAL',
                    'Esport' => 'ROLE_ESPORT',
                    'Communication' => 'ROLE_COMMUNICATION',
                    'Évènementiel' => 'ROLE_EVENEMENTIEL',
                ])
                ->allowMultipleChoices(true)
        ];
    }
}
