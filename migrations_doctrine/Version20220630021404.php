<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220630021404 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wine_pool_order (id INT AUTO_INCREMENT NOT NULL, wine_pool_id INT NOT NULL, order_id INT NOT NULL, token_id INT NOT NULL, currency VARCHAR(255) NOT NULL, price NUMERIC(36, 18) NOT NULL, fee NUMERIC(36, 18) NOT NULL, seller VARCHAR(255) NOT NULL, is_open TINYINT(1) DEFAULT \'1\' NOT NULL, UNIQUE INDEX UNIQ_393AC3E08D9F6D38 (order_id), INDEX IDX_393AC3E0B31ACE4A (wine_pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_pool_order ADD CONSTRAINT FK_393AC3E0B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE wine_pool_order');
    }
}
