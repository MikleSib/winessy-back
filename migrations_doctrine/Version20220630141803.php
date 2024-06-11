<?php

namespace Database\Migrations;

use App\Doctrine\Entity\WinePoolAttribute;
use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220630141803 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_CB7086315E237E06 ON wine_pool_attribute');
        $this->addSql('ALTER TABLE wine_pool_attribute ADD `key` VARCHAR(255) DEFAULT \'' . WinePoolAttribute::KEY_FIRST_SALE . '\'');
        $this->addSql('CREATE UNIQUE INDEX uniq_wine_pool_attribute_key_name ON wine_pool_attribute (`key`, name)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX uniq_wine_pool_attribute_key_name ON wine_pool_attribute');
        $this->addSql('ALTER TABLE wine_pool_attribute DROP `key`');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_CB7086315E237E06 ON wine_pool_attribute (name)');
    }
}
