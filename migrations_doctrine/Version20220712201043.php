<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220712201043 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_statistic (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, followers_count INT DEFAULT 0 NOT NULL, following_count INT DEFAULT 0 NOT NULL, concrete_bottles_count INT DEFAULT 0 NOT NULL, concrete_bottles_total_price NUMERIC(36, 18) DEFAULT \'0\' NOT NULL, UNIQUE INDEX UNIQ_647BCB78A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_statistic ADD CONSTRAINT FK_647BCB78A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user_statistic');
    }
}
