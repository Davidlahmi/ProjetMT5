<?php

namespace App\Form;

use App\Entity\CvInfoDeux;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CvInfoDeuxType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Prenom')
            ->add('Nom')
            ->add('profession')
            ->add('photopersonne', FileType::class, [
                'required' => false,
                'mapped' => false,
                'attr' => ['id' => 'photo-upload-input', 'style' => 'display: none;']
            ])
            ->add('ville')
            ->add('pays')
            ->add('email')
            ->add('telephone')
            ->add('liensite')
            ->add('langueune')
            ->add('niveaulangueune')
            ->add('languedeux')
            ->add('niveaulanguedeux')
            ->add('competenceune')
            ->add('competencdeux')
            ->add('competencetrois')
            ->add('competencequatre')
            ->add('cdun')
            ->add('cddeux')
            ->add('cdtrois')
            ->add('NomMetierUn')
            ->add('PossitionMetierUn')
            ->add('CommentaireMetierUn')
            ->add('CommentaireMetierDeux')
            ->add('CommentaireMetierTrois')
            ->add('CommentaireMetierQuatre')
            ->add('NomMetierDeux')
            ->add('PossitionMetierDeux')
            ->add('CommentaireMetierUnn')
            ->add('CommentaireMetierDeuxx')
            ->add('CommentaireMetierTroiss')
            ->add('CommentaireMetierQuatree')
            ->add('NomFormationUne')
            ->add('PositionFormationUne')
            ->add('NomFormationDeux')
            ->add('PositionFormationDeux')
            ->add('valider', SubmitType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => CvInfoDeux::class,
        ]);
    }
}
