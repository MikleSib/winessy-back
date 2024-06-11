<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220704125952 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dashboard_banner_images DROP FOREIGN KEY FK_B6E72C0520B990C0');
        $this->addSql('ALTER TABLE dashboard_banner_images ADD CONSTRAINT FK_B6E72C0520B990C0 FOREIGN KEY (dashboard_banner_id) REFERENCES dashboard_banner (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE dashboard_banner_images DROP FOREIGN KEY FK_B6E72C0520B990C0');
        $this->addSql('ALTER TABLE dashboard_banner_images ADD CONSTRAINT FK_B6E72C0520B990C0 FOREIGN KEY (dashboard_banner_id) REFERENCES dashboard_banner (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
    }
}
