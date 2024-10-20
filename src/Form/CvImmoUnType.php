<?php

namespace App\Form;

use App\Entity\CvImmoUn;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvImmoUnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Nom')
            ->add('prenom')
            ->add('age')
            ->add('permis')
            ->add('telephone')
            ->add('email')
            ->add('adresse')
            ->add('photopersonne', FileType::class, [
                'required' => false,
                'mapped' => false,
                'attr' => ['id' => 'photo-upload-input', 'style' => 'display: none;']
            ])
            ->add('FormationUne')
            ->add('FormationDeux')
            ->add('FormationTrois')
            ->add('NomMetier')
            ->add('CompetenceUne')
            ->add('CompetenceDeux')
            ->add('CompetenceTrois')
            ->add('CompetenceQuatre')
            ->add('CompetenceCinq')
            ->add('Competencesix')
            ->add('ExperienceUne')
            ->add('ExperienceDeux')
            ->add('ExperienceTrois')
            ->add('LangueUne')
            ->add('NiveauLangueUne')
            ->add('LangueDeux')
            ->add('NiveauLangueDeux')
            ->add('LangueTrois')
            ->add('NiveauLangueTrois')
            ->add('LoisirUn')
            ->add('LoisirDeux')
            ->add('LoisirTrois')
            ->add('LoisirQuatre')
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CvImmoUn::class,
        ]);
    }
}
