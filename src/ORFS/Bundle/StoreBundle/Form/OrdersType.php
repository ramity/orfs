<?php

namespace ORFS\Bundle\StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OrdersType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('products')
            ->add('firstName')
            ->add('lastName')
            ->add('company')
            ->add('communicationMethod')
            ->add('communicationValue')
            ->add('shippingStreetAddressOne')
            ->add('shippingStreetAddressTwo')
            ->add('shippingCity')
            ->add('shippingState')
            ->add('shippingZipCode')
            ->add('billingStreetAddressOne')
            ->add('billingStreetAddressTwo')
            ->add('billingCity')
            ->add('billingState')
            ->add('billingZipCode')
            ->add('deliveryMethod')
            ->add('deliveryInstructions')
            ->add('schedule')
            ->add('couponCodes')
            ->add('comments')
            ->add('eventLogs')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ORFS\Bundle\StoreBundle\Entity\Orders'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'orfs_bundle_storebundle_orders';
    }
}
