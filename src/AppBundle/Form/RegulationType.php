<?php

namespace AppBundle\Form;

use AppBundle\Entity\Regulation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class RegulationType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('valid',CheckboxType::class, array(
                'label' => 'Activado'
                ))
                ->add('name',TextType::class, array(
                        'label' => 'Nombre','attr' => array('placeholder' => 'Nombre del Documento')
                        ))
                ->add('number',TextType::class, array(
                        'label' => 'Número','attr' => array('placeholder' => 'Número de Identificación del Documento')
                        ))
                ->add('date',TextType::class, array(
                        'label' => 'Fecha','attr' => array('placeholder' => 'Fecha de emisión del documento')
                        ))
                ->add('document', FileType::class, array(
                    'label' => 'Archivi PDF del Documento'
                ));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Regulation::class,
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_regulation';
    }


}
