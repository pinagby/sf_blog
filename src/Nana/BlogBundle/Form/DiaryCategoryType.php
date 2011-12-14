<?php
namespace Nana\BlogBundle\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DiaryCategoryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name','text')
            ->add('description','textarea');
    }
    
    public function getName()
    {
        return 'new_diarycat_form';
    }
}
?>
