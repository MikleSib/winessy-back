<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20221104153120 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX blockchain_activity_transaction_hash_concrete_bottle_id ON blockchain_activity');
        $this->addSql('CREATE UNIQUE INDEX blockchain_activity_transaction_hash_concrete_bottle_id ON blockchain_activity (transaction_hash, wine_pool_concrete_bottle_id, activity_type)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX blockchain_activity_transaction_hash_concrete_bottle_id ON blockchain_activity');
        $this->addSql('CREATE UNIQUE INDEX blockchain_activity_transaction_hash_concrete_bottle_id ON blockchain_activity (transaction_hash, wine_pool_concrete_bottle_id)');
    }
}
