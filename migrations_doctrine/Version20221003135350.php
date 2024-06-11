<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20221003135350 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DELETE FROM blockchain_event');
        $this->addSql('DROP INDEX UNIQ_3146A015E55BD123 ON blockchain_event');
        $this->addSql('ALTER TABLE blockchain_event ADD uniq_hash VARCHAR(255) NOT NULL, DROP notifier_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3146A015DB31251 ON blockchain_event (uniq_hash)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_3146A015DB31251 ON blockchain_event');
        $this->addSql('ALTER TABLE blockchain_event ADD notifier_id INT NOT NULL, DROP uniq_hash');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_3146A015E55BD123 ON blockchain_event (notifier_id)');
    }
}
