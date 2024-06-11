<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20211130165417 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE countries (
                                                id INT AUTO_INCREMENT NOT NULL, 
                                                name VARCHAR(255) NOT NULL, 
                                                code2 VARCHAR(255) DEFAULT NULL, 
                                                code3 VARCHAR(255) DEFAULT NULL, 
                                                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE countries_flag_image (
                                                id INT NOT NULL, 
                                                countries_id INT DEFAULT NULL, 
                                                UNIQUE INDEX UNIQ_67B85AB04C05CCAB (countries_id), 
                                                PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE countries_flag_image ADD CONSTRAINT FK_67B85AB04C05CCAB FOREIGN KEY (countries_id) REFERENCES countries (id)');
        $this->addSql('ALTER TABLE countries_flag_image ADD CONSTRAINT FK_67B85AB0BF396750 FOREIGN KEY (id) REFERENCES images (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE countries_flag_image DROP FOREIGN KEY FK_67B85AB04C05CCAB');
        $this->addSql('DROP TABLE countries');
        $this->addSql('DROP TABLE countries_flag_image');
    }
}
