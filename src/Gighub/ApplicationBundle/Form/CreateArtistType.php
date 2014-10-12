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
                    Artist::ARTIST_BAND => 'Band / Duo / Group',
                    Artist::ARTIST_SOLO => 'Solo Artist'
                )
            ))
            ->add('members', 'entity', array(
                'class' => 'Gighub\ApplicationBundle\Entity\User',
                'expanded' => true,
                'multiple' => true,
                'property' => "realName",
                'by_reference' => false
            ))
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