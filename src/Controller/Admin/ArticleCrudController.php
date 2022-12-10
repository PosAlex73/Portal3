<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Enums\Blog\ArticleStatus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            IdField::new('id'),
            TextField::new('title'),
            DateTimeField::new('created'),
            DateTimeField::new('updated'),
            TextEditorField::new('text'),
            ChoiceField::new('status')
                ->setChoices(ArticleStatus::getWithLabel())
        ];

        return $fields;
    }
}
