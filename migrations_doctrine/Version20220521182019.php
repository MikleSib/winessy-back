<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220521182019 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool ADD max_total_supply INT DEFAULT NULL, ADD tokens_count INT DEFAULT NULL, ADD disabled TINYINT(1) DEFAULT \'0\' NOT NULL, ADD need_sync TINYINT(1) DEFAULT \'0\' NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A4986F37B3406DF ON wine_pool (pool_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A4986F351F1249 ON wine_pool (contract_address)');
        $this->addSql('ALTER TABLE wine_pool_attribute_metadata CHANGE wine_pool_attribute_id wine_pool_attribute_id INT DEFAULT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_A4986F37B3406DF ON wine_pool');
        $this->addSql('DROP INDEX UNIQ_A4986F351F1249 ON wine_pool');
        $this->addSql('ALTER TABLE wine_pool DROP max_total_supply, DROP tokens_count, DROP disabled, DROP need_sync');
        $this->addSql('ALTER TABLE wine_pool_attribute_metadata CHANGE wine_pool_attribute_id wine_pool_attribute_id INT NOT NULL');
    }
}
