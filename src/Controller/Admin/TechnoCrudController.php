<?php

namespace App\Controller\Admin;

use App\Entity\Techno;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TechnoCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Techno::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
