<?php

namespace Database\Migrations;

use Doctrine\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20211004133209 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema): void
    {

        $sql = <<<'SQL'
        INSERT INTO `admin_menu_roles` (`name`, `description`) VALUES 
            ('super_admin', 'Super Admin'), 
            ('admin', 'Admin')
        ;
SQL;
        $this->addSql($sql);

    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema): void
    {

    }
}
