<?php

namespace App\Controller\Admin;

use App\Entity\ImgProject;
use App\Entity\Project;
use App\Form\ImgProjectType;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ProjectCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Project::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name'),
            TextEditorField::new('description'),
            TextField::new('url'),
            TextField::new('RepositoryGit'),
            AssociationField::new('design'),
            CollectionField::new('img')->setEntryType(ImgProjectType::class),
            AssociationField::new('techno'),
        ];
    }
}
