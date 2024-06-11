<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220721143420 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE blockchain_activity (id INT AUTO_INCREMENT NOT NULL, wine_pool_concrete_bottle_id INT NOT NULL, user_blockchain_address_from_id INT NOT NULL, user_blockchain_address_to_id INT DEFAULT NULL, activity_type VARCHAR(255) NOT NULL, activity_price NUMERIC(36, 18) NOT NULL, created_at DATETIME DEFAULT NULL, INDEX IDX_90971D0770573106 (wine_pool_concrete_bottle_id), INDEX IDX_90971D07CF88BDA3 (user_blockchain_address_from_id), INDEX IDX_90971D07DCEA513A (user_blockchain_address_to_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE blockchain_activity ADD CONSTRAINT FK_90971D0770573106 FOREIGN KEY (wine_pool_concrete_bottle_id) REFERENCES wine_pool_concrete_bottle (id)');
        $this->addSql('ALTER TABLE blockchain_activity ADD CONSTRAINT FK_90971D07CF88BDA3 FOREIGN KEY (user_blockchain_address_from_id) REFERENCES user_blockchain_address (id)');
        $this->addSql('ALTER TABLE blockchain_activity ADD CONSTRAINT FK_90971D07DCEA513A FOREIGN KEY (user_blockchain_address_to_id) REFERENCES user_blockchain_address (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE blockchain_activity');
    }
}
