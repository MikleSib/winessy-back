<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220706195647 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('UPDATE wine_pool_concrete_bottle SET open_order_id=NULL, bought_order_id=NULL');
        $this->addSql('DELETE FROM wine_pool_order');
        $this->addSql('DELETE FROM wine_pool_concrete_bottle');
        $this->addSql('CREATE UNIQUE INDEX wine_pool_concrete_bottle_pool_id_token_id ON wine_pool_concrete_bottle (token_id, wine_pool_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX wine_pool_concrete_bottle_pool_id_token_id ON wine_pool_concrete_bottle');
    }
}
