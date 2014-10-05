<?php

namespace Gighub\ApplicationBundle\Form;

use Gighub\ApplicationBundle\Entity\ShowDate;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class CreateShowDateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('day', 'date')
            ->add('status', 'choice', array(
                'choices' => array(
                    ShowDate::STATUS_FREE => 'Free',
                    ShowDate::STATUS_BLOCK => 'Block',
                    ShowDate::STATUS_REQUESTED => 'Requested',
                    ShowDate::STATUS_USED => 'Used'
                )
            ))
            ->add('save', 'submit', array('label' => 'Create Show Date'))
        ;
    }

    public function getName()
    {
        return 'create_show_date';
    }
}