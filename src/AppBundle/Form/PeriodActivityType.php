<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;


class PeriodActivityType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('startdate', DateType::class, array(
                'widget' => 'single_text',
                'years' => range(date('Y'), date('Y')+1),
                'label' => 'Fecha Inicio'
                ))
            ->add('enddate',DateType::class, array(
                    'widget' => 'single_text',
                    'required' => false,
                    'years' => range(date('Y'), date('Y')+1),
                    'label' => 'Fecha Termino'
                    ))
            ->add('description',TextareaType::class, array(
                'attr' => array('placeholder' => 'Actividad',
                            'maxlength' => 500,
                            'rows' => 4,
                            'cols' => 50),
                'label' => 'Actividad'))
            /*->add('periodDuration','entity',array(
                'class' => 'AppBundle:PeriodDuration',
                'attr' => array('placeholder' => 'Duración'),
                'label' => 'Duración'));*/
                ->add('periodDuration');
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\PeriodActivity'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_periodactivity';
    }


}
