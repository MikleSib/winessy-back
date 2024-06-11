<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20220901123406 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {
        $this->addSql('
            UPDATE `wine_pool_concrete_bottle`
            SET  wine_pool_concrete_bottle.first_buyer_user_blockchain_address_id = wine_pool_concrete_bottle.`user_blockchain_address_id`
        ');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {

    }
}
