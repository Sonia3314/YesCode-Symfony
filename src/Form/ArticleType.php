<?php

namespace App\Form;

use App\Entity\Article;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ArticleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class , [
            'label' => 'Titre de votre article',
            'required' =>false,
            'attr' =>  ['placeholder' => 'Tapez votre titre ici ']
                ])
            ->add('intro', TextType::class , [
                'label' => 'Intro de votre article',
                'required' =>false,
                'attr' =>  ['placeholder' => 'Une phrase d\'accroche', 'class' => 'bg-light']
                    ])
            ->add('content', TextareaType::class , [
                'label' => 'Votre contenu',
                'required' =>false,
                'attr' =>  ['placeholder' => 'Dites-nous tout !']
                    ])
            ->add('Image', TextType::class , [
                'label' => 'Adresse de l\'image',
                'required' =>false,
                'attr' =>  ['placeholder' => 'Collez un lien d\'image']
                    ])
            ->add('Envoyer', SubmitType::class)
            ;

    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Article::class,
        ]);
    }
}
