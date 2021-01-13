<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Form;

use Sylius\Bundle\ProductBundle\Form\Type\ProductType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\FormBuilderInterface;

class ProductTypeExtension extends AbstractTypeExtension
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('archivedAt', DateTimeType::class, [
                'label' => 'sylius_archivable_products_plugin.form.product.archived_at',
                'date_widget' => 'single_text',
                'time_widget' => 'single_text',
                'required' => false,
            ])
            ->add('archiveWhenOutOfStock', CheckboxType::class, [
                'label' => 'sylius_archivable_products_plugin.form.product.archive_when_out_of_stock',
                'required' => false,
            ]);
    }

    public static function getExtendedTypes(): iterable
    {
        yield ProductType::class;
    }
}
