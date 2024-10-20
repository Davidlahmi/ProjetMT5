<?php

namespace App\Form;

use App\Entity\CvComptaHuit;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvComptableHuitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('profession')
            ->add('pays')
            ->add('ville')
            ->add('email')
            ->add('telephone')
            ->add('liensite')
            ->add('langueune')
            ->add('niveaulangueune')
            ->add('languedeux')
            ->add('niveaulanguedeux')
            ->add('certifune')
            ->add('certifdeux')
            ->add('cdune')
            ->add('cddeux')
            ->add('cdtrois')
            ->add('NomMetierUn')
            ->add('PositionMetierUn')
            ->add('CommentaireMetierUn')
            ->add('CommentaireMetierDeux')
            ->add('NomMetierDeux')
            ->add('PositionMetierDeux')
            ->add('CommentaireMetierUnn')
            ->add('CommentaireMetierDeuxx')
            ->add('NomMetierTrois')
            ->add('PositionMetierTrois')
            ->add('CommentaireMetierUnnn')
            ->add('CommentaireMetierDeuxxx')
            ->add('CommentaireMetiertroisss')
            ->add('NomFormationUne')
            ->add('PositionFormationUne')
            ->add('NomFormationDeux')
            ->add('PositionFormationDeux')
            ->add('PhotoPersonne', FileType::class, [
                'required' => false,
                'mapped' => false,
                'attr' => ['id' => 'photo-upload-input', 'style' => 'display: none;']
            ])
            ->add('valider', SubmitType::class);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CvComptaHuit::class,
        ]);
    }
}
