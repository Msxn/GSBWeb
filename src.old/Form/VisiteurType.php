<?php

namespace App\Form;

use App\Entity\Visiteur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ResetType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VisiteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            //->add('nom',TextType::class, array('label' => 'Nom:', 'attr' => array('placeholder' => 'Nom ...')))
            //->add('prenom',TextType::class, array('label' => 'Prenom:', 'attr' => array('placeholder' => 'Prenom ...')))
            //->add('adresse',TextType::class, array('label' => 'Adresse:', 'attr' => array('placeholder' => 'Adresse ...')))
            //->add('ville',TextType::class, array('label' => 'Ville:', 'attr' => array('placeholder' => 'Ville ...')))
            //->add('cp',TextType::class, array('label' => 'Code Postal:', 'attr' => array('placeholder' => 'Code postal ...')))
            //->add('dateEmbauche',DateType::class, array('label' => 'Date d\'embauche:', 'attr' => array('class' => '')))
            ->add('login',TextType::class, array('label' => 'Identifiant:', 'attr' => array('placeholder' => 'ID ...', 'class' => 'form-control')))
            ->add('mdp',TextType::class, array('label' => 'Mot de passe:', 'attr' => array('placeholder' => '@&ésdèçà_ç ...', 'class' => 'form-control')))
            ->add('valider',SubmitType::class, array('label' => 'Valider', 'attr' => array( 'class' => 'btn btn-primary')))
            ->add('annuler',ResetType::class, array('label' => 'Annuler', 'attr' => array( 'class' => 'btn btn-danger')))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Visiteur::class,
        ]);
    }
}
