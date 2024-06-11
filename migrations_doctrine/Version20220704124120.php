<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220704124120 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE dashboard_banner (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, link VARCHAR(255) NOT NULL, rating INT NOT NULL, is_active TINYINT(1) DEFAULT \'0\' NOT NULL, priority INT DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE dashboard_banner_images (id INT NOT NULL, dashboard_banner_id INT NOT NULL, UNIQUE INDEX UNIQ_B6E72C0520B990C0 (dashboard_banner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE dashboard_banner_images ADD CONSTRAINT FK_B6E72C0520B990C0 FOREIGN KEY (dashboard_banner_id) REFERENCES dashboard_banner (id)');
        $this->addSql('ALTER TABLE dashboard_banner_images ADD CONSTRAINT FK_B6E72C05BF396750 FOREIGN KEY (id) REFERENCES images (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dashboard_banner_images DROP FOREIGN KEY FK_B6E72C0520B990C0');
        $this->addSql('DROP TABLE dashboard_banner');
        $this->addSql('DROP TABLE dashboard_banner_images');
    }
}
