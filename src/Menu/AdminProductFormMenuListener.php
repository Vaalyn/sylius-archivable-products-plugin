<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Menu;

use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;

class AdminProductFormMenuListener
{
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu->addChild('archivable_product')
            ->setAttribute('template', '@SyliusArchivableProductsPlugin/Admin/Product/Tab/_archivableProduct.html.twig')
            ->setLabel('sylius_archivable_products_plugin.ui.archive');
    }
}
