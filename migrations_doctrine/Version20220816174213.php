<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220816174213 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE payment_transaction_go_pay DROP INDEX IDX_911ABC8BF94C8806, ADD UNIQUE INDEX UNIQ_911ABC8BF94C8806 (concrete_bottle_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE payment_transaction_go_pay DROP INDEX UNIQ_911ABC8BF94C8806, ADD INDEX IDX_911ABC8BF94C8806 (concrete_bottle_id)');
    }
}
