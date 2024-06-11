<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220915221727 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blockchain_event (id INT AUTO_INCREMENT NOT NULL, notifier_id INT NOT NULL, chain_id INT NOT NULL, transaction_hash VARCHAR(255) NOT NULL, node_creation_time DATETIME NOT NULL, event_class VARCHAR(255) NOT NULL, event_dto JSON NOT NULL COMMENT \'(DC2Type:json)\', is_processed TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_3146A015E55BD123 (notifier_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE blockchain_event');
    }
}
