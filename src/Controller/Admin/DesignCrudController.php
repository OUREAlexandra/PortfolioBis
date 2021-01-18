<?php

namespace App\Controller\Admin;

use App\Entity\Design;
use App\Form\ImgDesignType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\TextEditorType;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class DesignCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Design::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextField::new('urlAdobe'),
            TextEditorField::new('description'),
            AssociationField::new('project'),
            CollectionField::new('img')->setEntryType(ImgDesignType::class),
            AssociationField::new('techno'),
        ];
    }

}
