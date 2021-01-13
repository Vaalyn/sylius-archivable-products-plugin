<h1 align="center">Sylius Archivable Products Plugin</h1>

<p align="center">Plugin to make products archivable when they shouldn't be available anymore. Also includes the option to archive products automatically when they reach a stock of 0 on all variants.</p>

## Quickstart Installation

1. Require plugin via Composer
```
composer require vaachar/sylius-archivable-products-plugin
```
2. Inlcude config.yaml in `_sylius.yaml`
```
- { resource: "@SyliusArchivableProductsPlugin/Resources/config/config.yaml" }
```

3. Use trait and add interface to `src/Entity/Product/Product.php`
```
class Product extends BaseProduct implements IsArchivableProductInterface
{
    use ArchivableProductTrait;

    ...
}
```

4. Execute migrations
```
bin/console doctrine:migrations:migrate
```

## Usage

This plugin adds a new menu entry to the side menu when creating or editing a product called `Archive`.

There you can activate the `Archive when out of stock` option to let this plugin automatically disable a product and archive it. You can also manually enter a date/time to archive the product there.

![](https://github.com/Vaalyn/sylius-archivable-products-plugin/raw/master/screenshots/product_side_menu.png)

![](https://github.com/Vaalyn/sylius-archivable-products-plugin/raw/master/screenshots/product_archive_menu.png)

On the admin product listing page you can also quickly archive a product via the `Archive` action button.

![](https://github.com/Vaalyn/sylius-archivable-products-plugin/raw/master/screenshots/product_list_archive_button.png)

Archiving a product will hide it from the admin product listing so that your shop administrators can easily identify if a disabled product is only temporarily disabled or if it is archived and thus discontinued. You can view all archived products by selecting the respective filter.
