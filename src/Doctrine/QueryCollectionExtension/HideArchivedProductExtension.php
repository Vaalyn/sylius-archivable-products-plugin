<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Doctrine\QueryCollectionExtension;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Extension\ContextAwareQueryCollectionExtensionInterface;
use ApiPlatform\Core\Bridge\Doctrine\Orm\Util\QueryNameGeneratorInterface;
use Doctrine\ORM\QueryBuilder;

final class HideArchivedProductExtension implements ContextAwareQueryCollectionExtensionInterface
{
    /** @var string */
    private $productClass;

    public function __construct(string $productClass)
    {
        $this->productClass = $productClass;
    }

    public function applyToCollection(
        QueryBuilder $queryBuilder,
        QueryNameGeneratorInterface $queryNameGenerator,
        string $resourceClass,
        string $operationName = null,
        array $context = []
    ): void {
        if ($this->productClass !== $resourceClass) {
            return;
        }

        if (isset($context['filters']['exists']['archivedAt'])) {
            return;
        }

        $rootAlias = $queryBuilder->getRootAliases()[0];

        $queryBuilder->andWhere(sprintf('%s.archivedAt IS NULL', $rootAlias));
    }
}
