<?php

namespace App\Controller\Admin;

use App\Entity\ImgProject;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImgProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImgProject::class;
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
