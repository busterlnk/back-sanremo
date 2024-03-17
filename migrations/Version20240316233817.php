<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240316233817 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE games_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game (id INT NOT NULL, sport_id INT DEFAULT NULL, player_one VARCHAR(255) NOT NULL, player_two VARCHAR(255) NOT NULL, individual BOOLEAN NOT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p1ps INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, points INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_232B318CAC78BCF8 ON game (sport_id)');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT FK_232B318CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE games DROP CONSTRAINT fk_ff232b31ac78bcf8');
        $this->addSql('DROP TABLE games');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE games_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE games (id INT NOT NULL, sport_id INT DEFAULT NULL, player_one VARCHAR(255) NOT NULL, player_two VARCHAR(255) NOT NULL, individual BOOLEAN NOT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p1ps INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, points INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_ff232b31ac78bcf8 ON games (sport_id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT fk_ff232b31ac78bcf8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT FK_232B318CAC78BCF8');
        $this->addSql('DROP TABLE game');
    }
}
