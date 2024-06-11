<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220512170651 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE wine_pool (id INT AUTO_INCREMENT NOT NULL, pool_id VARCHAR(255) DEFAULT NULL, contract_address VARCHAR(255) DEFAULT NULL, priority INT DEFAULT 0 NOT NULL, created_at DATETIME DEFAULT NULL, updated_at DATETIME DEFAULT NULL, deleted_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, alias VARCHAR(255) NOT NULL, updated_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_CB7086315E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_metadata (id INT AUTO_INCREMENT NOT NULL, wine_pool_attribute_id INT NOT NULL, is_required TINYINT(1) DEFAULT \'0\' NOT NULL, value_type ENUM(\'DATE_TIME\', \'DECIMAL\', \'INT\', \'STRING\', \'TEXT\', \'DOCUMENT\', \'BOOL\') COMMENT \'(DC2Type:value_type_enum)\' NOT NULL, filter ENUM(\'range_filter\', \'select_filter\', \'hidden_filter\', \'select_range_filter\') COMMENT \'(DC2Type:filter_enum)\' DEFAULT NULL, filter_data JSON DEFAULT NULL COMMENT \'(DC2Type:json)\', UNIQUE INDEX UNIQ_5A8D17E47E3404AD (wine_pool_attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_value (id INT AUTO_INCREMENT NOT NULL, wine_pool_id INT NOT NULL, wine_pool_attribute_id INT NOT NULL, dtype VARCHAR(255) NOT NULL, INDEX IDX_900AFCAFB31ACE4A (wine_pool_id), INDEX IDX_900AFCAF7E3404AD (wine_pool_attribute_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_value_datetime (id INT NOT NULL, value DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_value_decimal (id INT NOT NULL, value NUMERIC(36, 18) DEFAULT NULL, INDEX value_idx (value), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_value_int (id INT NOT NULL, value INT DEFAULT NULL, INDEX value_idx (value), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_value_string (id INT NOT NULL, value VARCHAR(255) DEFAULT NULL, INDEX value_idx (value), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_attribute_value_text (id INT NOT NULL, value LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine_pool_image (id INT NOT NULL, wine_pool_id INT NOT NULL, UNIQUE INDEX UNIQ_92E5427B31ACE4A (wine_pool_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE wine_pool_attribute_metadata ADD CONSTRAINT FK_5A8D17E47E3404AD FOREIGN KEY (wine_pool_attribute_id) REFERENCES wine_pool_attribute (id)');
        $this->addSql('ALTER TABLE wine_pool_attribute_value ADD CONSTRAINT FK_900AFCAFB31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
        $this->addSql('ALTER TABLE wine_pool_attribute_value ADD CONSTRAINT FK_900AFCAF7E3404AD FOREIGN KEY (wine_pool_attribute_id) REFERENCES wine_pool_attribute (id)');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_datetime ADD CONSTRAINT FK_97FC869FBF396750 FOREIGN KEY (id) REFERENCES wine_pool_attribute_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_decimal ADD CONSTRAINT FK_8E9BF315BF396750 FOREIGN KEY (id) REFERENCES wine_pool_attribute_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_int ADD CONSTRAINT FK_FA0C3B62BF396750 FOREIGN KEY (id) REFERENCES wine_pool_attribute_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_string ADD CONSTRAINT FK_43CED6CABF396750 FOREIGN KEY (id) REFERENCES wine_pool_attribute_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_text ADD CONSTRAINT FK_24BF7948BF396750 FOREIGN KEY (id) REFERENCES wine_pool_attribute_value (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE wine_pool_image ADD CONSTRAINT FK_92E5427B31ACE4A FOREIGN KEY (wine_pool_id) REFERENCES wine_pool (id)');
        $this->addSql('ALTER TABLE wine_pool_image ADD CONSTRAINT FK_92E5427BF396750 FOREIGN KEY (id) REFERENCES images (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE wine_pool_attribute_value DROP FOREIGN KEY FK_900AFCAFB31ACE4A');
        $this->addSql('ALTER TABLE wine_pool_image DROP FOREIGN KEY FK_92E5427B31ACE4A');
        $this->addSql('ALTER TABLE wine_pool_attribute_metadata DROP FOREIGN KEY FK_5A8D17E47E3404AD');
        $this->addSql('ALTER TABLE wine_pool_attribute_value DROP FOREIGN KEY FK_900AFCAF7E3404AD');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_datetime DROP FOREIGN KEY FK_97FC869FBF396750');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_decimal DROP FOREIGN KEY FK_8E9BF315BF396750');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_int DROP FOREIGN KEY FK_FA0C3B62BF396750');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_string DROP FOREIGN KEY FK_43CED6CABF396750');
        $this->addSql('ALTER TABLE wine_pool_attribute_value_text DROP FOREIGN KEY FK_24BF7948BF396750');
        $this->addSql('DROP TABLE wine_pool');
        $this->addSql('DROP TABLE wine_pool_attribute');
        $this->addSql('DROP TABLE wine_pool_attribute_metadata');
        $this->addSql('DROP TABLE wine_pool_attribute_value');
        $this->addSql('DROP TABLE wine_pool_attribute_value_datetime');
        $this->addSql('DROP TABLE wine_pool_attribute_value_decimal');
        $this->addSql('DROP TABLE wine_pool_attribute_value_int');
        $this->addSql('DROP TABLE wine_pool_attribute_value_string');
        $this->addSql('DROP TABLE wine_pool_attribute_value_text');
        $this->addSql('DROP TABLE wine_pool_image');
    }
}
