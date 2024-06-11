<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220704171356 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user_blockchain_address (id INT AUTO_INCREMENT NOT NULL, `address` VARCHAR(255) NOT NULL, is_inner TINYINT(1) DEFAULT \'0\' NOT NULL, UNIQUE INDEX user_blockchain_address_unique (address, is_inner), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user_user_blockchain_address (user_blockchain_address_id INT NOT NULL, user_id INT NOT NULL, INDEX IDX_F82BAC0F207C298C (user_blockchain_address_id), INDEX IDX_F82BAC0FA76ED395 (user_id), PRIMARY KEY(user_blockchain_address_id, user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_concrete_bottle (id INT AUTO_INCREMENT NOT NULL, wine_pool_id INT NOT NULL, user_blockchain_address_id INT NOT NULL, pool_id INT NOT NULL, INDEX IDX_F777B131B31ACE4A (wine_pool_id), INDEX IDX_F777B131207C298C (user_blockchain_address_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user_user_blockchain_address ADD CONSTRAINT FK_F82BAC0F207C298C FOREIGN KEY (user_blockchain_address_id) REFERENCES user_blockchain_address (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE user_user_blockchain_address ADD CONSTRAINT FK_F82BAC0FA76ED395 FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD CONSTRAINT FK_F777B131B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle ADD CONSTRAINT FK_F777B131207C298C FOREIGN KEY (user_blockchain_address_id) REFERENCES user_blockchain_address (id)');
        $this->addSql('ALTER TABLE wine_pool_order DROP FOREIGN KEY FK_393AC3E0B31ACE4A');
        $this->addSql('DROP INDEX IDX_393AC3E0B31ACE4A ON wine_pool_order');
        $this->addSql('ALTER TABLE wine_pool_order ADD wine_pool_concrete_bottle_id INT NOT NULL, ADD seller_blockchain_address_id INT NOT NULL, ADD buyer_blockchain_address_id INT DEFAULT NULL, DROP wine_pool_id, DROP token_id, DROP seller');
        $this->addSql('ALTER TABLE wine_pool_order ADD CONSTRAINT FK_393AC3E070573106 FOREIGN KEY (wine_pool_concrete_bottle_id) REFERENCES wine_pool_concrete_bottle (id)');
        $this->addSql('ALTER TABLE wine_pool_order ADD CONSTRAINT FK_393AC3E0FE0CC7D9 FOREIGN KEY (seller_blockchain_address_id) REFERENCES user_blockchain_address (id)');
        $this->addSql('ALTER TABLE wine_pool_order ADD CONSTRAINT FK_393AC3E0EAD5BBDA FOREIGN KEY (buyer_blockchain_address_id) REFERENCES user_blockchain_address (id)');
        $this->addSql('CREATE INDEX IDX_393AC3E070573106 ON wine_pool_order (wine_pool_concrete_bottle_id)');
        $this->addSql('CREATE INDEX IDX_393AC3E0FE0CC7D9 ON wine_pool_order (seller_blockchain_address_id)');
        $this->addSql('CREATE INDEX IDX_393AC3E0EAD5BBDA ON wine_pool_order (buyer_blockchain_address_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user_user_blockchain_address DROP FOREIGN KEY FK_F82BAC0F207C298C');
        $this->addSql('ALTER TABLE wine_pool_concrete_bottle DROP FOREIGN KEY FK_F777B131207C298C');
        $this->addSql('ALTER TABLE wine_pool_order DROP FOREIGN KEY FK_393AC3E0FE0CC7D9');
        $this->addSql('ALTER TABLE wine_pool_order DROP FOREIGN KEY FK_393AC3E0EAD5BBDA');
        $this->addSql('ALTER TABLE wine_pool_order DROP FOREIGN KEY FK_393AC3E070573106');
        $this->addSql('DROP TABLE user_blockchain_address');
        $this->addSql('DROP TABLE user_user_blockchain_address');
        $this->addSql('DROP TABLE wine_pool_concrete_bottle');
        $this->addSql('DROP INDEX IDX_393AC3E070573106 ON wine_pool_order');
        $this->addSql('DROP INDEX IDX_393AC3E0FE0CC7D9 ON wine_pool_order');
        $this->addSql('DROP INDEX IDX_393AC3E0EAD5BBDA ON wine_pool_order');
        $this->addSql('ALTER TABLE wine_pool_order ADD wine_pool_id INT NOT NULL, ADD token_id INT NOT NULL, ADD seller VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP wine_pool_concrete_bottle_id, DROP seller_blockchain_address_id, DROP buyer_blockchain_address_id');
        $this->addSql('ALTER TABLE wine_pool_order ADD CONSTRAINT FK_393AC3E0B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_393AC3E0B31ACE4A ON wine_pool_order (wine_pool_id)');
    }
}
