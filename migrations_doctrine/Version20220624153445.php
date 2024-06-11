<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220624153445 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool CHANGE need_sync synchronization_direction TINYINT(1) DEFAULT NULL');
        $this->addSql('ALTER TABLE wine_pool_attribute_metadata CHANGE filter_data filter_data JSON DEFAULT NULL COMMENT \'(DC2Type:json_array)\'');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool CHANGE synchronization_direction need_sync TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('ALTER TABLE wine_pool_attribute_metadata CHANGE filter_data filter_data JSON DEFAULT NULL COMMENT \'(DC2Type:json)\'');
    }
}
