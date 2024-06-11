<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220625113929 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE countries_flag_image RENAME INDEX uniq_67b85ab04c05ccab TO UNIQ_5E491A57AEBAE514');
        $this->addSql('ALTER TABLE get_id_kyc_requests RENAME INDEX idx_95c7705f9395c3f3 TO IDX_73701B2B9395C3F3');
        $this->addSql('ALTER TABLE users CHANGE first_name first_name VARCHAR(255) NOT NULL, CHANGE last_name last_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE favorite_users RENAME INDEX idx_2f23270ea76ed395 TO IDX_A20B8ECDA76ED395');
        $this->addSql('ALTER TABLE favorite_users RENAME INDEX idx_2f23270e7808b1ad TO IDX_A20B8ECDFA3A7DFB');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE countries_flag_image RENAME INDEX uniq_5e491a57aebae514 TO UNIQ_67B85AB04C05CCAB');
        $this->addSql('ALTER TABLE favorite_users RENAME INDEX idx_a20b8ecdfa3a7dfb TO IDX_2F23270E7808B1AD');
        $this->addSql('ALTER TABLE favorite_users RENAME INDEX idx_a20b8ecda76ed395 TO IDX_2F23270EA76ED395');
        $this->addSql('ALTER TABLE get_id_kyc_requests RENAME INDEX idx_73701b2b9395c3f3 TO IDX_95C7705F9395C3F3');
        $this->addSql('ALTER TABLE users CHANGE first_name first_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE last_name last_name VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
