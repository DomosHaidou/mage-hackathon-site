<?php

namespace MagentoHackathon\RegistrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class ProjectIdeaType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ->add('name')
        ->add('description', 'textarea')
        ->add('author');
    }

    public function getName()
    {
        return 'magentohackathon_registrationbundle_projectideatype';
    }
}
