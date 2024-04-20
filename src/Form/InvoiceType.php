<?php

namespace App\Form;

use App\Entity\Invoice;
use phpDocumentor\Reflection\Types\Integer;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InvoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add(
                'invoice_date',
                DateType::class,
                [
                    'label' => 'Invoice Date',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'invoice_number',
                IntegerType::class,
                [
                    'label' => 'Invoice Number',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'customer_id',
                IntegerType::class,
                [
                    'label' => 'Customer ID',
                    'attr' => [
                        'class' => 'form-control mb-2',
                    ],
                ]
            )
            ->add(
                'create_invoice',
                SubmitType::class,
                [
                    'label' => 'Create Invoice',
                    'attr' => [
                        'class' => 'btn btn-primary mb-2',
                    ],
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Invoice::class,
        ]);
    }
}
