<?php

namespace BarcoBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class BarcoType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('tipo', ChoiceType::class, array(
          'choices'  => array(
            'Velero' => "Velero",
            'Motor' => "Motor"),
          'label' => "Tipo de barco",
          "attr" => ['class' => 'selectOption']))
        ->add('estado', ChoiceType::class, array(
          'choices'  => array(
            'Ocasión' => "Ocasión",
            'Nuevo' => "Nuevo"),
          'label' => "Estado del barco",
          "attr" => ['class' => 'selectOption']))
        ->add('marca', TextType::class)
        ->add('modelo', TextType::class)
        ->add('precio', TextType::class, array('label' => 'Precio de venta'))
        ->add('eslora', TextType::class)
        //Selector de fechas. Se añade la clase para darle forma en el css
        ->add('year', DateType::class, array('widget' => 'choice','attr' => ['class' => 'select']))
        ->add('pais', TextType::class,  array('label' => 'Pais de venta'))
        ->add('foto', TextType::class, array('label' => 'Foto (url)'))
        ->add('provincia', TextType::class)
        ->add('guardar',SubmitType::class, array('attr' => array('class' => 'save')));
    }

    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'BarcoBundle\Entity\Barco'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'barcobundle_barco';
    }


}
