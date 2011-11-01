<?php
namespace Nana\BlogBundle\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class MembersType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('password', 'password')
            ->add('birthday', 'date',array('required'=>false,))
            ->add('email', 'email')
            ->add('sex', 'choice',array(
                'choices' => array('m' =>'Male','f'=>'Female'),
                'required' => true,
            ))
        ;
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class'      => 'Nana\BlogBundle\Entity\Members',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention'       => 'task_item',
        );
    }

    public function getName()
    {
        return 'nana_blogbundle_memberstype';
    }
}

?>
