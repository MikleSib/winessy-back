<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220811190739 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_transaction_go_pay (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, wine_pool_id INT NOT NULL, concrete_bottle_id INT DEFAULT NULL, payment_id VARCHAR(255) NOT NULL, amount NUMERIC(10, 2) NOT NULL, request JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', response JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\', exception_response LONGTEXT DEFAULT NULL, external_payment_id INT DEFAULT NULL, external_payment_status VARCHAR(255) DEFAULT NULL, external_gate_way_url VARCHAR(255) DEFAULT NULL, mint_bottle_transaction_hash VARCHAR(255) DEFAULT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_911ABC8B4C3A3BB (payment_id), UNIQUE INDEX UNIQ_911ABC8B1E3D2C69 (external_payment_id), INDEX IDX_911ABC8BA76ED395 (user_id), INDEX IDX_911ABC8BB31ACE4A (wine_pool_id), INDEX IDX_911ABC8BF94C8806 (concrete_bottle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE payment_transaction_go_pay ADD CONSTRAINT FK_911ABC8BA76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE payment_transaction_go_pay ADD CONSTRAINT FK_911ABC8BB31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
        $this->addSql('ALTER TABLE payment_transaction_go_pay ADD CONSTRAINT FK_911ABC8BF94C8806 FOREIGN KEY (concrete_bottle_id) REFERENCES wine_pool_concrete_bottle (id)');
        $this->addSql('DROP TABLE payment_system_adv_cash');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE payment_system_adv_cash (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, wine_pool_id INT DEFAULT NULL, amount NUMERIC(10, 3) NOT NULL, response LONGTEXT CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, bottle_mint VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, status VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, INDEX IDX_283DC6F8A76ED395 (user_id), INDEX IDX_283DC6F8B31ACE4A (wine_pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE payment_system_adv_cash ADD CONSTRAINT FK_283DC6F8A76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('ALTER TABLE payment_system_adv_cash ADD CONSTRAINT FK_283DC6F8B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('DROP TABLE payment_transaction_go_pay');
    }
}
