<?php

namespace App\Form;

use App\Entity\Cvteste;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvtesteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', null, ['required' => false])
            ->add('prenom', null, ['required' => false])
            ->add('pays', null, ['required' => false])
            ->add('ville', null, ['required' => false])
            ->add('email', null, ['required' => false])
            ->add('tel', null, ['required' => false])
            ->add('liensite', null, ['required' => false])
            ->add('langueune', null, ['required' => false])
            ->add('nivaulangueune', null, ['required' => false])
            ->add('languedeux', null, ['required' => false])
            ->add('niveaulanguedeux', null, ['required' => false])
            ->add('competenceune', null, ['required' => false])
            ->add('competencedeux', null, ['required' => false])
            ->add('competencetrois', null, ['required' => false])
            ->add('cdune', null, ['required' => false])
            ->add('cddeux', null, ['required' => false])
            ->add('cdtrois', null, ['required' => false])
            ->add('nom_metier_un', null, ['required' => false])
            ->add('position_metier_un', null, ['required' => false])
            ->add('commentaire_metier_un', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('commentaire_metier_deux', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('commentaire_metier_trois', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('nom_metier_deux', null, ['required' => false])
            ->add('position_metier_deux', null, ['required' => false])
            ->add('commentaire_metier_unn', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('commentaire_metier_deuxx', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('commentaire_metier_troiss', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('nom_metier_trois', null, ['required' => false])
            ->add('position_metier_trois', null, ['required' => false])
            ->add('commentaire_metier_unnn', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('commentaire_metier_deuxxx', TextareaType::class, [
                'required' => false,
                'attr' => ['class' => 'InputFormm']
            ])
            ->add('nom_formation', null, ['required' => false])
            ->add('position_formation', null, ['required' => false])
            ->add('PhotoPersonne', FileType::class, [
                'required' => false,
                'mapped' => false,
                'attr' => ['id' => 'photo-upload-input', 'style' => 'display: none;']
            ])
            ->add('generer', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Cvteste::class,
        ]);
    }
}
