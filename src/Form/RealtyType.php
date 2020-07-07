<?php

namespace App\Form;

use App\Entity\Realty;
use App\Entity\Tenant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RealtyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('type')
            ->add('state')
            ->add('price_sell')
            ->add('price_buy')
            ->add('price_rent')
            ->add('surface')
            ->add('nb_room')
            ->add('description')
            ->add('photo', FileType::class,[
                'label' => false,
                'multiple' => false,
                'mapped' => false,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Realty::class,
        ]);
    }
}
