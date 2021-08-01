<?php

namespace App\Form;

use App\Entity\Reservation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReservationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('date')
            ->add('time')
            ->add('pickUpDate')
            ->add('pickUpTime')
            ->add('bookReturn')
            ->add('returnDate')
            ->add('returnTime')
            ->add('expireDateTime')
            ->add('origin')
            ->add('destination')
            ->add('price')
            ->add('tva')
            ->add('paymentType')
            ->add('nbPersons')
            ->add('nbBriefCases')
            ->add('volNumber')
            ->add('gamme')
            ->add('vehicle')
            ->add('vehiclePic')
            ->add('nbKm')
            ->add('nbHours')
            ->add('estimatedTime')
            ->add('extraInfos')
            ->add('orderPath')
            ->add('status')
            ->add('done')
            ->add('way')
            ->add('ref')
            ->add('extras')
            ->add('pickup_position')
            ->add('pickoff_position')
            ->add('company')
            ->add('feedback')
            ->add('canceledReservation')
            ->add('yes')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Reservation::class,
        ]);
    }
}
