<?php

namespace Visa\CandidatBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class CandidatType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('cin', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'cin')))
                ->add('nom', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Nom')))
                ->add('email', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'mail')))
                ->add('situationfamiliale', TextType::class,array('required'=>true, 'attr'=> array('placeholder'=>'Situation familiale')))
                ->add('nbjours')
                ->add('etat')
                ->add('Ajouter', SubmitType::class); 
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Visa\CandidatBundle\Entity\Candidat'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'visa_candidatbundle_candidat';
    }


}
