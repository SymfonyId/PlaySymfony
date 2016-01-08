<?php

namespace AppBundle\Form;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('group', EntityType::class, array(
                'class' => 'AppBundle\Entity\Group',
                'choice_label' => 'name',
                'label' => 'Group',
            ))
            ->add('fullName', TextType::class, array(
                'label' => 'Nama Lengkap',
            ))
            ->add('email', TextType::class, array(
                'label' => 'Email',
            ))
            ->add('phoneNumber', TextType::class, array(
                'label' => 'Phone Number',
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Simpan',
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Contact',
        ));
    }
}
