<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class SystemType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name',TextType::class, array(
            'attr' => array('placeholder' => 'Nombre'),
            'label' => 'Nombre'))
            ->add('shortdescription',TextareaType::class, array(
                'attr' => array('placeholder' => 'Descripción',
                            'maxlength' => 500),
                'label' => 'Descripción'))
            ->add('description',TextareaType::class, array(
                'attr' => array('placeholder' => 'Descripción Técnica'),
                'label' => 'Descripción Técnica')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\System'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_system';
    }


}
