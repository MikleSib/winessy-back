<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220515132104 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE write_transactions_log (id INT AUTO_INCREMENT NOT NULL, is_finished TINYINT(1) DEFAULT \'0\' NOT NULL, from_account VARCHAR(255) NOT NULL, contract_address VARCHAR(255) NOT NULL, contract_proxy_object_class VARCHAR(255) NOT NULL, method_name VARCHAR(255) NOT NULL, arguments JSON NOT NULL COMMENT \'(DC2Type:json)\', transaction_params JSON NOT NULL COMMENT \'(DC2Type:json)\', transaction_hash VARCHAR(255) DEFAULT NULL, transaction_receipt JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', transaction_status TINYINT(1) DEFAULT NULL, exception_class VARCHAR(255) DEFAULT NULL, exception_message LONGTEXT DEFAULT NULL, created_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE write_transactions_log');
    }
}
