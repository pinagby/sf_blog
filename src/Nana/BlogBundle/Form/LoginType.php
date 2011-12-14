<?php
namespace Nana\BlogBundle\form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class LoginType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('password', 'password')
        ;
    }

    public function getName()
    {
        return 'login';
    }
}
?>
