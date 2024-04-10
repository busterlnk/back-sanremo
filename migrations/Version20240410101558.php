<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240410101558 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE padel_game DROP CONSTRAINT fk_14eecca1ac78bcf8');
        $this->addSql('ALTER TABLE padel_game DROP CONSTRAINT fk_14eecca1a76ed395');
        $this->addSql('DROP INDEX idx_14eecca1a76ed395');
        $this->addSql('DROP INDEX idx_14eecca1ac78bcf8');
        $this->addSql('ALTER TABLE padel_game ADD sport VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE padel_game ADD "user" VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE padel_game DROP sport_id');
        $this->addSql('ALTER TABLE padel_game DROP user_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE padel_game ADD sport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE padel_game ADD user_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE padel_game DROP sport');
        $this->addSql('ALTER TABLE padel_game DROP "user"');
        $this->addSql('ALTER TABLE padel_game ADD CONSTRAINT fk_14eecca1ac78bcf8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE padel_game ADD CONSTRAINT fk_14eecca1a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_14eecca1a76ed395 ON padel_game (user_id)');
        $this->addSql('CREATE INDEX idx_14eecca1ac78bcf8 ON padel_game (sport_id)');
    }
}
