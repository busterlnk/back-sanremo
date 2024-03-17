<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240316234108 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sport DROP CONSTRAINT fk_1a85efd24cf558f8');
        $this->addSql('DROP INDEX idx_1a85efd24cf558f8');
        $this->addSql('ALTER TABLE sport DROP user_sport_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE sport ADD user_sport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE sport ADD CONSTRAINT fk_1a85efd24cf558f8 FOREIGN KEY (user_sport_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_1a85efd24cf558f8 ON sport (user_sport_id)');
    }
}
