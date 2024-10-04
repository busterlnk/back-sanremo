<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240712132037 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE tenis_game DROP CONSTRAINT fk_e409fb2567b3b43d');
        $this->addSql('DROP INDEX idx_e409fb2567b3b43d');
        $this->addSql('ALTER TABLE tenis_game RENAME COLUMN users_id TO user_id');
        $this->addSql('ALTER TABLE tenis_game ADD CONSTRAINT FK_E409FB25A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_E409FB25A76ED395 ON tenis_game (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE tenis_game DROP CONSTRAINT FK_E409FB25A76ED395');
        $this->addSql('DROP INDEX IDX_E409FB25A76ED395');
        $this->addSql('ALTER TABLE tenis_game RENAME COLUMN user_id TO users_id');
        $this->addSql('ALTER TABLE tenis_game ADD CONSTRAINT fk_e409fb2567b3b43d FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_e409fb2567b3b43d ON tenis_game (users_id)');
    }
}
