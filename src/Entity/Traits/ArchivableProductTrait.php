<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

trait ArchivableProductTrait
{
    /**
     * @ORM\Column(name="archived_at", type="datetime", nullable=true)
     *
     * @var \DateTimeInterface|null
     */
    protected $archivedAt;

    /**
     * @ORM\Column(name="archive_when_out_of_stock", type="boolean")
     *
     * @var bool
     */
    protected $archiveWhenOutOfStock;

    public function getArchivedAt(): ?\DateTimeInterface
    {
        return $this->archivedAt;
    }

    public function setArchivedAt(?\DateTimeInterface $archivedAt): self
    {
        $this->archivedAt = $archivedAt;

        return $this;
    }

    public function getArchiveWhenOutOfStock(): bool
    {
        return $this->archiveWhenOutOfStock;
    }

    public function setArchiveWhenOutOfStock(bool $archiveWhenOutOfStock): self
    {
        $this->archiveWhenOutOfStock = $archiveWhenOutOfStock;

        return $this;
    }
}
