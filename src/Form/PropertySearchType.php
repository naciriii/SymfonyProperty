<?php

namespace App\Form;

use App\Entity\PropertySearch;
use App\Entity\Option;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class PropertySearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('MaxPrice',IntegerType::class, [
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => "Max Price"
                ]
            ])
            ->add('MinSurface',IntegerType::class,[
                'required' => false,
                'label' => false,
                'attr' => [
                    'placeholder' => "Main surface"


                ]
            ])
            ->add('options',EntityType::class, [
                'required' => false,
                'label' => false,
                'choice_label' => 'name',
                'multiple' => true,
                'class' => Option::class
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PropertySearch::class,
            'method' => 'GET',
            'csrf_protection' => false
        ]);
    }

    public function getBlockPrefix()
    {
        return '';
    }
}
