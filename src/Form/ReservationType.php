<?php

namespace App\Form;

use App\Entity\Artist;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Nom', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    'autofocus' => 'true',
                    'placeholder' =>
                    'Votre nom',
                ],
                'label' => 'Nom',
                'required' => true,
            ])
            ->add('Prenom', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    'autofocus' => 'true',
                    'placeholder' =>
                    'Votre prénom',
                ],
                'label' => 'Prénom',
                'required' => true,
            ])
            ->add('Telephone', TextType::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    'autofocus' => 'true',
                    'placeholder' =>
                    'Votre téléphone',
                ],
                'label' => 'Téléphone',
                'required' => true,
            ])
            ->add('Email', EmailType::class, [
                'attr' => [
                    'class' => 'form-control mb-2',
                    'autofocus' => 'true',
                    'placeholder' => 'Votre émail',
                ],
                'label' => 'Email',
                'required' => true,
            ])
            ->add('Artiste', EntityType::class, [
                //Connextion à l'entité
                'class' => Artist::class,
                'label' => 'Artiste',
                //Choix multiple non
                'multiple' => false,
                //Case à cocher
                'expanded' => false,
            ])
            ->add('Date', DateType::class, [
                'widget' => 'choice',
                'years' => range(date('Y'), date('Y')),
                'months' => range(date('m') + 2, 8),
                'days' => range(20, 22, 1),
            ])
            ->add('HeurePlage', ChoiceType::class, [
                'choices' => [
                    '16h - 18h' => true,
                    '18h - 20h' => true,
                    '21h - 23h' => true,
                ],
            ])
            ->add('Nombredeplace', IntegerType::class)
            ->add('Envoyer', SubmitType::class);
    }


    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
