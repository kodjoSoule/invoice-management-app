<?php

namespace App\Form;

use App\Entity\Invoice;
use App\Entity\InvoiceLine;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceLineType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'Description',
                TextType::class,
                [
                    'label' => 'Description',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'quantity',
                NumberType::class,
                [
                    'scale' => 2,
                    'label' => 'Quantity',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'amount',
                NumberType::class,
                [
                    'scale' => 2,
                    'label' => 'Amount',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'vat_amount',
                NumberType::class,
                [
                    'scale' => 2,
                    'label' => 'VAT Amount',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'total_vat',
                NumberType::class,
                [
                    'scale' => 2,
                    'label' => 'Total VAT',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]

            )
            ->add(
                'invoice_id',
                EntityType::class,
                [
                    'class' => Invoice::class,
                    'choice_label' => 'invoice_number',
                    'label' => 'Invoice',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                "Create",
                SubmitType::class,
                [
                    'label' => 'Creat Invoice Line',
                    'attr' => [
                        'class' => 'btn btn-primary mb-2',
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => InvoiceLine::class,
        ]);
    }
}
