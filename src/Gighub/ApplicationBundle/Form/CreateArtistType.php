<?php

namespace Gighub\ApplicationBundle\Form;

use Gighub\ApplicationBundle\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateArtistType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', 'text')
            ->add('artistType', 'choice', array(
                'choices' => array(
                    Artist::ARTIST_BAND => 'band',
                    Artist::ARTIST_SOLO => 'solo'
                )
            ))
            ->add('members', 'integer')
            ->add('city', 'text')
            ->add('genre', 'text')
            ->add('email', 'email')
            ->add('save', 'submit', array('label' => 'Create Artist'))
        ;
    }

    public function getName()
    {
        return 'create_artist';
    }
}