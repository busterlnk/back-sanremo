<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240712104538 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE padel_game DROP CONSTRAINT fk_14eecca1ac78bcf8');
        $this->addSql('DROP SEQUENCE sport_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tenis_game_id_seq CASCADE');
        $this->addSql('ALTER TABLE tenis_game DROP CONSTRAINT fk_e409fb25ac78bcf8');
        $this->addSql('ALTER TABLE tenis_game DROP CONSTRAINT fk_e409fb25a76ed395');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE tenis_game');
        $this->addSql('DROP INDEX idx_14eecca1ac78bcf8');
        $this->addSql('ALTER TABLE padel_game DROP sport_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE sport_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tenis_game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE sport (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE tenis_game (id INT NOT NULL, sport_id INT DEFAULT NULL, user_id INT DEFAULT NULL, player_one VARCHAR(255) DEFAULT NULL, player_two VARCHAR(255) DEFAULT NULL, individual BOOLEAN DEFAULT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, mode VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, finished_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, winner VARCHAR(255) DEFAULT NULL, p1ps INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_e409fb25a76ed395 ON tenis_game (user_id)');
        $this->addSql('CREATE INDEX idx_e409fb25ac78bcf8 ON tenis_game (sport_id)');
        $this->addSql('COMMENT ON COLUMN tenis_game.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tenis_game.finished_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE tenis_game ADD CONSTRAINT fk_e409fb25ac78bcf8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE tenis_game ADD CONSTRAINT fk_e409fb25a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE padel_game ADD sport_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE padel_game ADD CONSTRAINT fk_14eecca1ac78bcf8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_14eecca1ac78bcf8 ON padel_game (sport_id)');
    }
}
