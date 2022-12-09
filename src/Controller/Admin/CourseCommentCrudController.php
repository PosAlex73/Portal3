<?php

namespace App\Controller\Admin;

use App\Entity\CourseComment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CourseCommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CourseComment::class;
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
