<?php

namespace App\Form;

use App\Entity\Realty;
use App\Entity\Tenant;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RealtyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title',TextType::class,[
                'label' =>'Titre',
                'attr' => [
                    'placeholder' => 'Ex: Maison proche gare'
                ]
            ])
            ->add('type',TextType::class,[
                'label' =>'Type de bien',
                'attr' => [
                    'placeholder' => 'Ex: Studio, Maison, Appartement'
                ]
            ])
            ->add('state',TextType::class,[
                'label' =>'Etat du bien',
                'attr' => [
                    'placeholder' => 'Ex: Propre, bon'
                ]
            ])
            ->add('price_sell',MoneyType::class,[
                'label' =>'Prix de vente',
                'attr' => [
                    'placeholder' => 'Valeur du bien en cas de vente'
                ]
            ])
            ->add('price_buy',MoneyType::class,[
                'label' =>"Prix de d'achat",
                'attr' => [
                    'placeholder' => "Valeur d'achat du bien"
                ]
            ])
            ->add('price_rent',MoneyType::class,[
                'label' =>"Prix du loyer",
                'attr' => [
                    'placeholder' => "Valeur du loyer par mois"
                ]
            ])
            ->add('surface',IntegerType::class,[
                'label' =>"Surface habitable",
                'attr' => [
                    'placeholder' => "Surface du bien en m²"
                ]
            ])
            ->add('nb_room',IntegerType::class,[
                'label' =>"Nombre de pièce",
                'attr' => [
                    'placeholder' => "Nombre de pièce"
                ]
            ])
            ->add('description',TextareaType::class,[
                'label' =>'Description du bien',
                'attr' => [
                    'placeholder' => 'Ex: Belle maison exposé plein sud, avec vue sur la mer, 4 pièces ...'
                ]
            ])
            ->add('photo', FileType::class,[
                'label' => 'Photo du bien',
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
