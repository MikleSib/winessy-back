<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220201113208 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE roles (
                            id INT AUTO_INCREMENT NOT NULL, 
                            name VARCHAR(255) NOT NULL, 
                            description VARCHAR(255) NOT NULL, 
                            priority INT DEFAULT 0 NOT NULL, 
                            created_at DATETIME DEFAULT NULL, 
                            updated_at DATETIME DEFAULT NULL, 
                            PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE favorite_users (
                            user_id INT NOT NULL, 
                            favorite_user_id INT NOT NULL, 
                            INDEX IDX_2F23270EA76ED395 (user_id), 
                            INDEX IDX_2F23270E7808B1AD (favorite_user_id), 
                            PRIMARY KEY(user_id, favorite_user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE favorite_users ADD CONSTRAINT FK_2F23270EA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE favorite_users ADD CONSTRAINT FK_2F23270E7808B1AD FOREIGN KEY (favorite_user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users  
                            ADD inviter_id INT DEFAULT NULL, 
                            ADD referral_code VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E9B79F4F04 FOREIGN KEY (inviter_id) REFERENCES users (id) ON DELETE SET NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E96447454A ON users (referral_code)');
        $this->addSql('CREATE INDEX IDX_1483A5E9B79F4F04 ON users (inviter_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE roles');
        $this->addSql('DROP TABLE favorite_users');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E9B79F4F04');
        $this->addSql('DROP INDEX UNIQ_1483A5E96447454A ON users');
        $this->addSql('DROP INDEX IDX_1483A5E9B79F4F04 ON users');
        $this->addSql('ALTER TABLE users DROP inviter_id, DROP referral_code');
    }
}
