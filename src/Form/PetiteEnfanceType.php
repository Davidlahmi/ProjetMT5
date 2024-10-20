<?php

namespace App\Form;

use App\Entity\PetiteEnfance;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PetiteEnfanceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('profession')
            ->add('profil')
            ->add('LangueUne')
            ->add('LangueDeux')
            ->add('CompetenceUne')
            ->add('CompetenceDeux')
            ->add('CompetenceTrois')
            ->add('CompetenceQuatre')
            ->add('telephone')
            ->add('email')
            ->add('liensite')
            ->add('adresse')
            ->add('emaildeux')
            ->add('etude')
            ->add('anneeetude')
            ->add('diplomeUn')
            ->add('DiplomeDeux')
            ->add('DiplomeTrois')
            ->add('nomtravail')
            ->add('travailUn')
            ->add('travailDeux')
            ->add('travailTrois')
            ->add('nomtravailledeux')
            ->add('anneetravailledeux')
            ->add('descriptiontravailledeux')
            ->add('descriptiontravailletrois')
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => PetiteEnfance::class,
        ]);
    }
}
