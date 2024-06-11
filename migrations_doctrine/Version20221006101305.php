<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20221006101305 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article (id INT AUTO_INCREMENT NOT NULL, wine_pool_id INT DEFAULT NULL, bcb_storer_id INT DEFAULT NULL, item_code VARCHAR(255) NOT NULL, article_data JSON NOT NULL COMMENT \'(DC2Type:json)\', created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_3C5F6FE7BF257463 (item_code), INDEX IDX_3C5F6FE7B31ACE4A (wine_pool_id), INDEX IDX_3C5F6FE7AD7419E7 (bcb_storer_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article_box (id INT AUTO_INCREMENT NOT NULL, bcb_article_id INT DEFAULT NULL, serial_number VARCHAR(255) NOT NULL, current_count INT NOT NULL, max_count INT NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_5FAD9940D948EE2 (serial_number), INDEX IDX_5FAD9940B100B14C (bcb_article_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_storer (id INT AUTO_INCREMENT NOT NULL, seller_siret_number VARCHAR(255) NOT NULL, logistic_provider_siret_number VARCHAR(255) NOT NULL, storer_data JSON NOT NULL COMMENT \'(DC2Type:json)\', created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_A98116BD68AD9AA7 (seller_siret_number), UNIQUE INDEX UNIQ_A98116BDF091EF57 (logistic_provider_siret_number), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article ADD CONSTRAINT FK_3C5F6FE7B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
        $this->addSql('ALTER TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article ADD CONSTRAINT FK_3C5F6FE7AD7419E7 FOREIGN KEY (bcb_storer_id) REFERENCES wine_pool_bordeaux_city_bond_receipt_confirmation_storer (id)');
        $this->addSql('ALTER TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article_box ADD CONSTRAINT FK_5FAD9940B100B14C FOREIGN KEY (bcb_article_id) REFERENCES wine_pool_bordeaux_city_bond_receipt_confirmation_article (id)');
        $this->addSql('ALTER TABLE countries ADD use_for_delivery TINYINT(1) DEFAULT \'0\' NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article_box DROP FOREIGN KEY FK_5FAD9940B100B14C');
        $this->addSql('ALTER TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article DROP FOREIGN KEY FK_3C5F6FE7AD7419E7');
        $this->addSql('DROP TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article');
        $this->addSql('DROP TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_article_box');
        $this->addSql('DROP TABLE wine_pool_bordeaux_city_bond_receipt_confirmation_storer');
        $this->addSql('ALTER TABLE countries DROP use_for_delivery');
    }
}
