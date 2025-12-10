<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251206062904 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        $this->addSql('
            ALTER TABLE user ADD COLUMN login VARCHAR(255) AFTER id,
            ADD COLUMN password VARCHAR(255) AFTER login
        ');

    }

    public function down(Schema $schema): void
    {
        $this->addSql('
            ALTER TABLE user
                DROP COLUMN login,
                DROP COLUMN password
        ');
    }
}
