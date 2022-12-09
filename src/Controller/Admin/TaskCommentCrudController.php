<?php

namespace App\Controller\Admin;

use App\Entity\TaskComment;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class TaskCommentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TaskComment::class;
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
