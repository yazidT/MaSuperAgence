<?php

namespace App\Form;

use App\Entity\Property;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PropertyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title',null,['label'=>'Titre :'])
            ->add('description',null,['label'=>'Description :'])
            ->add('surface',null,['label'=>'Surface :'])
            ->add('rooms',null,['label'=>'Nombre de pièces :'])
            ->add('bedrooms',null,['label'=>'Nombre de chambres :'])
            ->add('floor',null,['label'=>'Etage :'])
            ->add('price',null,['label'=>'Prix :'])
            ->add('heat',null,['label'=>'Chauffage :'])
            ->add('city',null,['label'=>'Ville :'])
            ->add('address',null,['label'=>'Adresse :'])
            ->add('zip_code',null,['label'=>'Code postale :'])
            ->add('sold',null,['label'=>'Vendu :'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Property::class,
        ]);
    }
}
