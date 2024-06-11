<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220515132846 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE write_transactions_log ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE write_transactions_log ADD CONSTRAINT FK_EBF81E45A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('CREATE INDEX IDX_EBF81E45A76ED395 ON write_transactions_log (user_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE write_transactions_log DROP FOREIGN KEY FK_EBF81E45A76ED395');
        $this->addSql('DROP INDEX IDX_EBF81E45A76ED395 ON write_transactions_log');
        $this->addSql('ALTER TABLE write_transactions_log DROP user_id');
    }
}
