<?php

namespace App\Controller\Admin;

use App\Entity\Dish;


use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;

use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use Vich\UploaderBundle\Form\Type\VichImageType;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;

class DishCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Dish::class;
    }
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('categrory')
            
        ;
    }

   
    public function configureFields(string $pageName): iterable
    {
        return [
            
            TextField::new('name'),
            AssociationField::new('categrory'),
            ImageField::new('image')
            ->setBasePath($this->getParameter('app.path.product_images'))
            ->onlyOnIndex(),
            TextareaField::new('imageFile')
            ->hideOnIndex()
            ->setFormType(VichImageType::class),
            //->hideOnIndex()
            //->setFormTypeOption('allow_delete', false),
            MoneyField::new('price')->setCurrency('TND'),
            TextEditorField::new('description'),
            

        ];
    }
    
}
