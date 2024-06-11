<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220627214251 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_system_adv_cash (
                                id INT AUTO_INCREMENT NOT NULL, 
                                user_id INT DEFAULT NULL, 
                                wine_pool_id INT DEFAULT NULL, 
                                amount NUMERIC(10, 3) NOT NULL, 
                                response LONGTEXT DEFAULT NULL, 
                                bottle_mint VARCHAR(255) DEFAULT NULL, 
                                status VARCHAR(255) DEFAULT NULL, 
                                created_at DATETIME DEFAULT NULL, 
                                updated_at DATETIME DEFAULT NULL, 
                                INDEX IDX_283DC6F8A76ED395 (user_id), 
                                INDEX IDX_283DC6F8B31ACE4A (wine_pool_id), 
                                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payment_system_adv_cash ADD CONSTRAINT FK_283DC6F8A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE payment_system_adv_cash ADD CONSTRAINT FK_283DC6F8B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE payment_system_adv_cash DROP FOREIGN KEY FK_283DC6F8A76ED395');
        $this->addSql('ALTER TABLE payment_system_adv_cash DROP FOREIGN KEY FK_283DC6F8B31ACE4A');
        $this->addSql('DROP TABLE payment_system_adv_cash');
    }
}
