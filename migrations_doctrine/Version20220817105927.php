<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220817105927 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_A4986F351F1249 ON wine_pool');
        $this->addSql('DROP INDEX UNIQ_A4986F37B3406DF ON wine_pool');
        $this->addSql('CREATE UNIQUE INDEX uniq_wine_pool_key_poolId ON wine_pool (pool_id, deleted_at)');
        $this->addSql('CREATE UNIQUE INDEX uniq_wine_pool_key_contractAddress ON wine_pool (contract_address, deleted_at)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX uniq_wine_pool_key_poolId ON wine_pool');
        $this->addSql('DROP INDEX uniq_wine_pool_key_contractAddress ON wine_pool');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A4986F351F1249 ON wine_pool (contract_address)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A4986F37B3406DF ON wine_pool (pool_id)');
    }
}
