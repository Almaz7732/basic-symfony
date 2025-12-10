<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251206132937 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            CREATE TABLE IF NOT EXISTS activity (
                id INT UNSIGNED AUTO_INCREMENT,
                url VARCHAR(255) NOT NULL,
                user_id INT(11) UNSIGNED NULL,
                agent VARCHAR(255) NULL,
                query TEXT,
                ip_addr VARCHAR(100) NOT NULL,
                created_at DATETIME NOT NULL,
                CONSTRAINT id PRIMARY KEY (id)
            )
        ');
    }

    public function down(Schema $schema): void
    {
        $this->addSql('DROP TABLE IF EXISTS activity');
    }
}
