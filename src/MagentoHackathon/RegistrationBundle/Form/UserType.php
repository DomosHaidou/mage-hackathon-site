<?php

namespace MagentoHackathon\RegistrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('mail', 'email')
            ->add('address')
            ->add('zip')
            ->add('city')
			->add('country')
            ->add('country', 'country')
            ->add('githubId')
            ->add('additionalInfos')
            ->add('memo')
            ->add('event')
        ;
    }

    public function getName()
    {
        return 'magentohackathon_registrationbundle_usertype';
    }
}
