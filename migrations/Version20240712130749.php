<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240712130749 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE tenis_game_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE tenis_game (id INT NOT NULL, users_id INT DEFAULT NULL, player_one VARCHAR(255) DEFAULT NULL, player_two VARCHAR(255) DEFAULT NULL, individual BOOLEAN DEFAULT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p1ps INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, finished_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, winner VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_E409FB2567B3B43D ON tenis_game (users_id)');
        $this->addSql('COMMENT ON COLUMN tenis_game.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN tenis_game.finished_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE tenis_game ADD CONSTRAINT FK_E409FB2567B3B43D FOREIGN KEY (users_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE tenis_game_id_seq CASCADE');
        $this->addSql('ALTER TABLE tenis_game DROP CONSTRAINT FK_E409FB2567B3B43D');
        $this->addSql('DROP TABLE tenis_game');
    }
}
