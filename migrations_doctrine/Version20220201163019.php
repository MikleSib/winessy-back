<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220201163019 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');


        $this->addSql('DROP INDEX UNIQ_1483A5E95E237E06 ON users');
        $this->addSql('ALTER TABLE users 
                    ADD first_name VARCHAR(255) DEFAULT NULL, 
                    ADD last_name VARCHAR(255) DEFAULT NULL, 
                    ADD description LONGTEXT DEFAULT NULL, 
                    CHANGE name nickname VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9A188FE64 ON users (nickname)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_1483A5E9A188FE64 ON users');
        $this->addSql('ALTER TABLE users ADD name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP nickname, DROP first_name, DROP last_name, DROP description');
    }
}
