<?php

namespace App\Controller\Admin;

use App\Entity\ImgDesign;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImgDesignCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImgDesign::class;
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
