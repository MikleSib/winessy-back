<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220426150000 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE customers (
                                    id INT AUTO_INCREMENT NOT NULL, 
                                    user_id INT DEFAULT NULL, 
                                    duplicated_user_id INT DEFAULT NULL, 
                                    is_approved TINYINT(1) DEFAULT \'0\' NOT NULL, 
                                    status VARCHAR(255) NOT NULL, 
                                    previous_status VARCHAR(255) DEFAULT NULL, 
                                    active_request_id INT DEFAULT NULL, 
                                    country_id INT DEFAULT NULL,
                                    birthday DATETIME NOT NULL,
                                    created_at DATETIME DEFAULT NULL, 
                                    updated_at DATETIME DEFAULT NULL, 
                                    deleted_at DATETIME DEFAULT NULL, 
                                    UNIQUE INDEX UNIQ_62534E21A76ED395 (user_id), 
                                    UNIQUE INDEX UNIQ_62534E2163DCDA53 (active_request_id), 
                                    INDEX IDX_62534E212F349808 (duplicated_user_id), 
                                    INDEX IDX_62534E21F92F3E70 (country_id), 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE get_id_kyc_requests (
                                    id INT AUTO_INCREMENT NOT NULL, 
                                    customer_id INT DEFAULT NULL, 
                                    status VARCHAR(255) NOT NULL, 
                                    previous_status VARCHAR(255) DEFAULT NULL, 
                                    created_at DATETIME NOT NULL, 
                                    updated_at DATETIME DEFAULT NULL, 
                                    reference VARCHAR(255) NOT NULL,
                                    verification_data LONGTEXT DEFAULT NULL, 
                                    INDEX IDX_95C7705F9395C3F3 (customer_id), 
                                    UNIQUE INDEX users_request_reference_unique (reference), 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log_get_id_kyc (
                                    id INT AUTO_INCREMENT NOT NULL, 
                                    user_id INT DEFAULT NULL, 
                                    processing_state VARCHAR(255) NOT NULL, 
                                    status VARCHAR(255) NOT NULL, 
                                    data LONGTEXT NOT NULL, 
                                    created_at DATETIME NOT NULL, 
                                    INDEX IDX_8F375F6CA76ED395 (user_id), 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE log_get_id_kyc_errors (
                                    id INT AUTO_INCREMENT NOT NULL, 
                                    created_at DATETIME DEFAULT NULL, 
                                    error_type VARCHAR(255) NOT NULL, 
                                    method VARCHAR(255) NOT NULL, 
                                    data LONGTEXT DEFAULT NULL, 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E21A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E2163DCDA53 FOREIGN KEY (active_request_id) REFERENCES get_id_kyc_requests (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E212F349808 FOREIGN KEY (duplicated_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE customers ADD CONSTRAINT FK_62534E21F92F3E70 FOREIGN KEY (country_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE get_id_kyc_requests ADD CONSTRAINT FK_95C7705F9395C3F3 FOREIGN KEY (customer_id) REFERENCES customers (id)');
        $this->addSql('ALTER TABLE log_get_id_kyc ADD CONSTRAINT FK_8F375F6CA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE get_id_kyc_requests DROP FOREIGN KEY FK_95C7705F9395C3F3');
        $this->addSql('ALTER TABLE customers DROP FOREIGN KEY FK_62534E2163DCDA53');
        $this->addSql('DROP TABLE customers');
        $this->addSql('DROP TABLE get_id_kyc_requests');
        $this->addSql('DROP TABLE log_get_id_kyc');
        $this->addSql('DROP TABLE log_get_id_kyc_errors');
    }
}
