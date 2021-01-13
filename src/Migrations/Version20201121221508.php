<?php

declare(strict_types=1);

namespace VaaChar\SyliusArchivableProductsPlugin\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201121221508 extends AbstractMigration
{
    public function getDescription() : string
    {
        return 'Add fields to product table to enable archiving.';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product ADD archived_at DATETIME DEFAULT NULL, ADD archive_when_out_of_stock TINYINT(1) NOT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sylius_product DROP archived_at, DROP archive_when_out_of_stock');
    }
}
