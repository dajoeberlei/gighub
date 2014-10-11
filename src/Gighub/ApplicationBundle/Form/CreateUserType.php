<?php

namespace Gighub\ApplicationBundle\Form;

use Gighub\ApplicationBundle\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateUserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email', 'email')
            ->add('save', 'submit', array('label' => 'Add User'))
        ;
    }

    public function getName()
    {
        return 'create_user';
    }
}