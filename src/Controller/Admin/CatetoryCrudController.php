<?php

namespace App\Controller\Admin;

use App\Entity\Catetory;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CatetoryCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Catetory::class;
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
