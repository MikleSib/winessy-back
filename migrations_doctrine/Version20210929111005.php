<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20210929111005 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE images (
                                    id INT AUTO_INCREMENT NOT NULL, 
                                    image VARCHAR(255) NOT NULL, 
                                    type ENUM(\'storage\', \'s3_public\', \'s3_private\') COMMENT \'(DC2Type:image_storage_enum)\' NOT NULL, 
                                    dtype VARCHAR(255) NOT NULL, 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE user_images (
                                    id INT NOT NULL, 
                                    user_id INT NOT NULL, 
                                    UNIQUE INDEX UNIQ_854DA557A76ED395 (user_id), 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');

        $this->addSql('CREATE TABLE users (
                                    id INT AUTO_INCREMENT NOT NULL, 
                                    name VARCHAR(255) NOT NULL, 
                                    email VARCHAR(255) NOT NULL, 
                                    unique_email VARCHAR(255) NOT NULL, 
                                    password VARCHAR(255) NOT NULL, 
                                    remember_token VARCHAR(100) DEFAULT NULL, 
                                    confirmed TINYINT(1) DEFAULT \'0\' NOT NULL, 
                                    confirmation_code VARCHAR(255) DEFAULT NULL, 
                                    created_at DATETIME DEFAULT NULL,
                                    updated_at DATETIME DEFAULT NULL,
                                    UNIQUE INDEX UNIQ_1483A5E95E237E06 (name), 
                                    UNIQUE INDEX UNIQ_1483A5E9E7927C74 (email), 
                                    UNIQUE INDEX UNIQ_1483A5E9EEE2B864 (unique_email), 
                                    PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_images ADD CONSTRAINT FK_854DA557A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE user_images ADD CONSTRAINT FK_854DA557BF396750 FOREIGN KEY (id) REFERENCES images (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_images DROP FOREIGN KEY FK_854DA557BF396750');
        $this->addSql('ALTER TABLE user_images DROP FOREIGN KEY FK_854DA557A76ED395');
        $this->addSql('DROP TABLE images');
        $this->addSql('DROP TABLE user_images');
        $this->addSql('DROP TABLE users');
    }
}
