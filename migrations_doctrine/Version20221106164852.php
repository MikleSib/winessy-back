<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20221106164852 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wine_delivery_task (id INT AUTO_INCREMENT NOT NULL, wine_pool_concrete_bottle_id INT NOT NULL, country_id INT NOT NULL, phone_code VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, zip_code VARCHAR(255) NOT NULL, city VARCHAR(255) NOT NULL, region VARCHAR(255) DEFAULT NULL, street_address VARCHAR(255) NOT NULL, street_address_2 VARCHAR(255) DEFAULT NULL, delivery_task_blockchain_id INT DEFAULT NULL, delivery_task_blockchain_status ENUM(\'New\', \'Canceled\', \'Executed\', \'WaitingForPayment\', \'DeliveryInProcess\') COMMENT \'(DC2Type:delivery_task_blockchain_status_enum)\' DEFAULT NULL, delivery_price NUMERIC(36, 18) DEFAULT NULL, tax NUMERIC(36, 18) DEFAULT NULL, created_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, updated_at DATETIME DEFAULT CURRENT_TIMESTAMP NOT NULL, UNIQUE INDEX UNIQ_C87D28A0A066192 (delivery_task_blockchain_id), INDEX IDX_C87D28A070573106 (wine_pool_concrete_bottle_id), INDEX IDX_C87D28A0F92F3E70 (country_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_delivery_task ADD CONSTRAINT FK_C87D28A070573106 FOREIGN KEY (wine_pool_concrete_bottle_id) REFERENCES wine_pool_concrete_bottle (id)');
        $this->addSql('ALTER TABLE wine_delivery_task ADD CONSTRAINT FK_C87D28A0F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE wine_delivery_task');
    }
}
