<?php

namespace MagentoHackathon\RegistrationBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
        ->add('event', null, array(
            'label' => 'Event',
        ))
        ->add('firstname', null, array(
            'label' => 'Firstname',
        ))
        ->add('lastname', null, array(
            'label' => 'Lastname',
        ))
        ->add('mail', 'email', array(
            'label' => 'E-Mail',
        ))
        ->add('address', null, array(
            'label' => 'Address',
        ))
        ->add('zip', null, array(
            'label' => 'Zip',
        ))
        ->add('city', null, array(
            'label' => 'City',
        ))
        ->add('country', 'country', array(
            'label' => 'Country',
        ))
        ->add('additionalInfos', null, array(
            'label' => 'c/o, etc.',
        ))
        ->add('memo', null, array(
            'label' => "Memo, e.g. you are vegetarian",
        ));
    }

    public function getName()
    {
        return 'magentohackathon_registrationbundle_usertype';
    }

    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'MagentoHackathon\RegistrationBundle\Entity\User',
            'csrf_protection' => true,
            'csrf_field_name' => '_token',
            // a unique key to help generate the secret token
            'intention' => 'user',
        );
    }
}
