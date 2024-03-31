<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240330201919 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE game_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE padel_game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE padel_game (id INT NOT NULL, sport_id INT DEFAULT NULL, user_id INT DEFAULT NULL, player_one VARCHAR(255) DEFAULT NULL, player_two VARCHAR(255) DEFAULT NULL, individual BOOLEAN DEFAULT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p1ps INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, points INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, finished_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_14EECCA1AC78BCF8 ON padel_game (sport_id)');
        $this->addSql('CREATE INDEX IDX_14EECCA1A76ED395 ON padel_game (user_id)');
        $this->addSql('COMMENT ON COLUMN padel_game.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN padel_game.finished_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE padel_game ADD CONSTRAINT FK_14EECCA1AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE padel_game ADD CONSTRAINT FK_14EECCA1A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT fk_232b318cac78bcf8');
        $this->addSql('ALTER TABLE game DROP CONSTRAINT fk_232b318ca76ed395');
        $this->addSql('DROP TABLE game');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE padel_game_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE game (id INT NOT NULL, sport_id INT DEFAULT NULL, user_id INT DEFAULT NULL, player_one VARCHAR(255) DEFAULT NULL, player_two VARCHAR(255) DEFAULT NULL, individual BOOLEAN DEFAULT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p1ps INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, points INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, finished_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_232b318ca76ed395 ON game (user_id)');
        $this->addSql('CREATE INDEX idx_232b318cac78bcf8 ON game (sport_id)');
        $this->addSql('COMMENT ON COLUMN game.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN game.finished_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT fk_232b318cac78bcf8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE game ADD CONSTRAINT fk_232b318ca76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE padel_game DROP CONSTRAINT FK_14EECCA1AC78BCF8');
        $this->addSql('ALTER TABLE padel_game DROP CONSTRAINT FK_14EECCA1A76ED395');
        $this->addSql('DROP TABLE padel_game');
    }
}
