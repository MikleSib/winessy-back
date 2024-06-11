<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220625114111 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wine_pool_statistic (id INT AUTO_INCREMENT NOT NULL, wine_pool_id INT DEFAULT NULL, uniq_owners_count INT DEFAULT 0 NOT NULL, viewers_count INT DEFAULT 0 NOT NULL, favorites_count INT DEFAULT 0 NOT NULL, price_change NUMERIC(36, 18) DEFAULT \'0\' NOT NULL, filter_data JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', UNIQUE INDEX UNIQ_55912F56B31ACE4A (wine_pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_pool_statistic ADD CONSTRAINT FK_55912F56B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE wine_pool_statistic');
    }
}
