<?php

namespace App\Controller\Admin;

use App\Entity\Article;
use App\Enums\Blog\ArticleStatus;
use App\Enums\Blog\ArticleType;
use Doctrine\ORM\Query\Expr\From;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\FormField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

use function Symfony\Component\Translation\t;

class ArticleCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Article::class;
    }

    public function configureFields(string $pageName): iterable
    {
        $fields = [
            FormField::addTab(t('general_info')),
            IdField::new('id')->setDisabled(),
            TextField::new('title'),
            DateTimeField::new('created'),
            DateTimeField::new('updated'),
            TextEditorField::new('text'),
            ChoiceField::new('status')
                ->setChoices(ArticleStatus::getWithLabel()),
            ChoiceField::new('type')->setChoices(
                ArticleType::getWithLabel()
            ),
        ];

        if ($pageName === Crud::PAGE_EDIT || $pageName === Crud::PAGE_DETAIL) {
            $fields[] = FormField::addTab(t('comments'));
            $fields[] = AssociationField::new('articleComments')
                ->setCrudController(ArticleCommentCrudController::class);
        }

        return $fields;
    }
}
