<?php

namespace ORFS\Bundle\StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class SchedulesType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title')
            ->add('description')
            ->add('minute')
            ->add('hour')
            ->add('day')
            ->add('month')
            ->add('year')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ORFS\Bundle\StoreBundle\Entity\Schedules'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'orfs_bundle_storebundle_schedules';
    }
}
