<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Entity\EntityListener;

use Doctrine\ORM\Event\PreUpdateEventArgs;
use Sylius\Component\Core\Model\ProductVariantInterface;
use VaaChar\SyliusArchivableProductsPlugin\Entity\IsArchivableProductInterface;

class ProductVariantEntityListener
{
    public function preUpdate(ProductVariantInterface $productVariant, PreUpdateEventArgs $event)
    {
        $this->archiveWhenOutOfStock($productVariant, $event);
    }

    protected function archiveWhenOutOfStock(
        ProductVariantInterface $productVariant,
        PreUpdateEventArgs $event
    ): void {
        /** @var IsArchivableProductInterface $product */
        $product = $productVariant->getProduct();

        if (!$product->getArchiveWhenOutOfStock()) {
            return;
        }

        /** @var ProductVariantInterface $currentProductVariant */
        foreach ($product->getVariants() as $currentProductVariant) {
            if (!$currentProductVariant->isTracked()) {
                continue;
            }

            if ($currentProductVariant->isInStock()) {
                continue;
            }

            $currentProductVariant->setEnabled(false);
        }

        $product->setEnabled(false);
    }
}
