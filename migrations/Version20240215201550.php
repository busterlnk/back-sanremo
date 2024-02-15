<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240215201550 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE games_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE sport_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE games (id INT NOT NULL, sport_id INT DEFAULT NULL, player_one VARCHAR(255) NOT NULL, player_two VARCHAR(255) NOT NULL, individual BOOLEAN NOT NULL, p11s INT DEFAULT NULL, p12s INT DEFAULT NULL, p13s INT DEFAULT NULL, p1ps INT DEFAULT NULL, p21s INT DEFAULT NULL, p22s INT DEFAULT NULL, p23s INT DEFAULT NULL, p2ps INT DEFAULT NULL, saque INT DEFAULT NULL, points INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_FF232B31AC78BCF8 ON games (sport_id)');
        $this->addSql('CREATE TABLE sport (id INT NOT NULL, user_sport_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1A85EFD24CF558F8 ON sport (user_sport_id)');
        $this->addSql('ALTER TABLE games ADD CONSTRAINT FK_FF232B31AC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE sport ADD CONSTRAINT FK_1A85EFD24CF558F8 FOREIGN KEY (user_sport_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE games_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE sport_id_seq CASCADE');
        $this->addSql('ALTER TABLE games DROP CONSTRAINT FK_FF232B31AC78BCF8');
        $this->addSql('ALTER TABLE sport DROP CONSTRAINT FK_1A85EFD24CF558F8');
        $this->addSql('DROP TABLE games');
        $this->addSql('DROP TABLE sport');
    }
}
