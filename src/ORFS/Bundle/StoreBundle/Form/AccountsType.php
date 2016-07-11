<?php

namespace ORFS\Bundle\StoreBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AccountsType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('customerId')
            ->add('password')
            ->add('timeCreated')
            ->add('timeLastActive')
            ->add('isVerified')
            ->add('orders')
            ->add('firstName')
            ->add('lastName')
            ->add('company')
            ->add('communicationMethod')
            ->add('communicationValue')
            ->add('streetAddressOne')
            ->add('streetAddressTwo')
            ->add('city')
            ->add('state')
            ->add('zipCode')
            ->add('paymentMethods')
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ORFS\Bundle\StoreBundle\Entity\Accounts'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'orfs_bundle_storebundle_accounts';
    }
}
