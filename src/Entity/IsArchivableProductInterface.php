<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Entity;

use Sylius\Component\Core\Model\ProductInterface;

interface IsArchivableProductInterface extends ProductInterface
{
    public function getArchivedAt(): ?\DateTimeInterface;

    public function setArchivedAt(?\DateTimeInterface $archivedAt): self;

    public function getArchiveWhenOutOfStock(): bool;

    public function setArchiveWhenOutOfStock(bool $archiveWhenOutOfStock): self;
}
