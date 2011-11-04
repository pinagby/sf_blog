<?php
namespace Nana\BlogBundle\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class DiaryType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('title','text')
            ->add('content','textarea',array())
            ->add('diaryCategory');
    }
    
    public function getName()
    {
        return 'new_diary_form';
    }
}
?>
