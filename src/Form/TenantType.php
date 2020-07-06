<?php

namespace App\Form;

use App\Entity\Realty;
use App\Entity\Tenant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class TenantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('firstname')
            ->add('lastname')
            ->add('phone')
            ->add('email', EmailType::class,[
                'required' => true
            ])
            ->add('realty', EntityType::class,[
                'class' => 'App\Entity\Realty',
                'choice_label' => function($realty){
                    return $realty ? $realty->getId()." ".$realty->getTitle():null;
                },
                'expanded' => false,
                'multiple'=>false,
                'required'=>true
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Tenant::class,

        ]);
    }
}
