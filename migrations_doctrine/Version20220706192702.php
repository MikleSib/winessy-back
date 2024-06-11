<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220706192702 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DELETE FROM wine_pool_order');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD open_order_id INT DEFAULT NULL, ADD bought_order_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD CONSTRAINT FK_F777B131A946FA52 FOREIGN KEY (open_order_id) REFERENCES wine_pool_order (id)');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD CONSTRAINT FK_F777B1314CD0E833 FOREIGN KEY (bought_order_id) REFERENCES wine_pool_order (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F777B131A946FA52 ON wine_pool_concrete_bottle (open_order_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_F777B1314CD0E833 ON wine_pool_concrete_bottle (bought_order_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP FOREIGN KEY FK_F777B131A946FA52');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP FOREIGN KEY FK_F777B1314CD0E833');
        $this->addSql('DROP INDEX UNIQ_F777B131A946FA52 ON wine_pool_concrete_bottle');
        $this->addSql('DROP INDEX UNIQ_F777B1314CD0E833 ON wine_pool_concrete_bottle');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP open_order_id, DROP bought_order_id');
    }
}
