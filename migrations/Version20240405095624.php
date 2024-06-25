<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240405095624 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cars CHANGE title title VARCHAR(255) NOT NULL, CHANGE fuel fuel VARCHAR(255) NOT NULL, CHANGE image_name image_name VARCHAR(255) DEFAULT NULL, CHANGE image_size image_size INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE contacts CHANGE firstname firstname VARCHAR(255) NOT NULL, CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE email email VARCHAR(255) NOT NULL, CHANGE phone phone VARCHAR(255) NOT NULL, CHANGE title title VARCHAR(255) NOT NULL, CHANGE message message LONGTEXT NOT NULL');
        $this->addSql('ALTER TABLE opening_hours CHANGE open_day open_day VARCHAR(255) NOT NULL, CHANGE open_hour open_hour VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE opinions CHANGE lastname lastname VARCHAR(255) NOT NULL, CHANGE commentary commentary LONGTEXT NOT NULL, CHANGE is_validated is_validated TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE prestations CHANGE title title VARCHAR(255) NOT NULL, CHANGE message message LONGTEXT NOT NULL, CHANGE image_name image_name VARCHAR(255) DEFAULT NULL, CHANGE image_size image_size INT DEFAULT NULL, CHANGE updated_at updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE users CHANGE id id INT AUTO_INCREMENT NOT NULL, CHANGE email email VARCHAR(180) NOT NULL, CHANGE password password VARCHAR(255) NOT NULL, CHANGE roles roles JSON NOT NULL COMMENT \'(DC2Type:json)\'');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_1483A5E9E7927C74 ON users (email)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE messenger_messages');
        $this->addSql('ALTER TABLE cars CHANGE title title VARCHAR(30) NOT NULL, CHANGE fuel fuel VARCHAR(10) NOT NULL, CHANGE image_name image_name VARCHAR(100) NOT NULL, CHANGE image_size image_size INT NOT NULL, CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('ALTER TABLE contacts CHANGE firstname firstname VARCHAR(30) NOT NULL, CHANGE lastname lastname VARCHAR(30) NOT NULL, CHANGE email email VARCHAR(254) NOT NULL, CHANGE phone phone VARCHAR(30) NOT NULL, CHANGE title title VARCHAR(100) NOT NULL, CHANGE message message TEXT NOT NULL');
        $this->addSql('ALTER TABLE opening_hours CHANGE open_day open_day VARCHAR(30) NOT NULL, CHANGE open_hour open_hour VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE opinions CHANGE lastname lastname VARCHAR(30) NOT NULL, CHANGE commentary commentary TEXT NOT NULL, CHANGE is_validated is_validated VARCHAR(30) NOT NULL');
        $this->addSql('ALTER TABLE prestations CHANGE title title VARCHAR(100) NOT NULL, CHANGE message message TEXT DEFAULT NULL, CHANGE image_name image_name VARCHAR(100) NOT NULL, CHANGE image_size image_size INT NOT NULL, CHANGE updated_at updated_at DATE NOT NULL');
        $this->addSql('DROP INDEX UNIQ_1483A5E9E7927C74 ON users');
        $this->addSql('ALTER TABLE users CHANGE id id VARCHAR(36) NOT NULL, CHANGE email email VARCHAR(254) NOT NULL, CHANGE roles roles VARCHAR(40) NOT NULL, CHANGE password password VARCHAR(60) NOT NULL');
    }
}
