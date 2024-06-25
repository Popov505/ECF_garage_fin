<?php

namespace App\Controller\Admin;

use App\Entity\Opinions;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class OpinionsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Opinions::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField ::new('lastname');
        yield TextareaField::new('commentary');
        yield ChoiceField::new('grade')->setChoices([
            '1'=>'1',
            '2'=>'2',
            '3'=>'3',
            '4'=>'4',
            '5'=>'5',
        ])->renderExpanded();
        yield BooleanField ::new('is_validated');
    }
}
