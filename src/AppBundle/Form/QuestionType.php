<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class QuestionType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('title',TextType::class, array(
                'label' => 'Pregunta/Título','attr' => array('placeholder' => 'Pregunta o Título de una sección de ayuda')
                ))
            ->add('message',TextareaType::class, array(
            'attr' => array('placeholder' => 'Respuesta/Mensaje',
                        'maxlength' => 500,
                        'rows' => 4,
                        'cols' => 50),
            'label' => 'Respuesta/Mensaje'))
        ->add('responsable')
        ->add('proccess');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Question'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_question';
    }


}
