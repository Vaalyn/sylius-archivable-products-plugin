<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>
</p>

<h1 align="center">Sylius Archivable Products Plugin</h1>

<p align="center">Plugin to make products archivable when they shouldn't be used anymore. Also includes the option to archive products automatically when they reach a stock of 0 on all vairants.</p>

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
class Product extends BaseProduct implements HasArchivableProductInterface
{
    use ArchivableProductTrait;

    ...
}
```

4. Execute migrations
```
bin/console doctrine:migrations:migrate
```
