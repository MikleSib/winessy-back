<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220901123303 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD first_buyer_user_id INT DEFAULT NULL, ADD first_buyer_user_blockchain_address_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD CONSTRAINT FK_F777B13180BF2D67 FOREIGN KEY (first_buyer_user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD CONSTRAINT FK_F777B13155C24971 FOREIGN KEY (first_buyer_user_blockchain_address_id) REFERENCES user_blockchain_address (id)');
        $this->addSql('CREATE INDEX IDX_F777B13180BF2D67 ON wine_pool_concrete_bottle (first_buyer_user_id)');
        $this->addSql('CREATE INDEX IDX_F777B13155C24971 ON wine_pool_concrete_bottle (first_buyer_user_blockchain_address_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP FOREIGN KEY FK_F777B13180BF2D67');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP FOREIGN KEY FK_F777B13155C24971');
        $this->addSql('DROP INDEX IDX_F777B13180BF2D67 ON wine_pool_concrete_bottle');
        $this->addSql('DROP INDEX IDX_F777B13155C24971 ON wine_pool_concrete_bottle');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP first_buyer_user_id, DROP first_buyer_user_blockchain_address_id');
    }
}
