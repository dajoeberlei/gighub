<?php

namespace Gighub\ApplicationBundle\Form;

use Gighub\ApplicationBundle\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class UploadPictureType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('description', 'textarea')
            ->add('file', 'file')
            ->add('save', 'submit', array('label' => 'Upload Picture'))
        ;
    }

    public function getName()
    {
        return 'upload_picture';
    }
}