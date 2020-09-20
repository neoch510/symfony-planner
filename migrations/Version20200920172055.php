<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200920172055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE planner (id INT AUTO_INCREMENT NOT NULL, social_media_id INT NOT NULL, user_id INT NOT NULL, content LONGTEXT NOT NULL, image VARCHAR(255) NOT NULL, video VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, date_post DATETIME NOT NULL, INDEX IDX_9551776164AE4959 (social_media_id), INDEX IDX_95517761A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE social_media (id INT AUTO_INCREMENT NOT NULL, user_id INT NOT NULL, name VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, slug VARCHAR(255) NOT NULL, INDEX IDX_20BC159EA76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE planner ADD CONSTRAINT FK_9551776164AE4959 FOREIGN KEY (social_media_id) REFERENCES social_media (id)');
        $this->addSql('ALTER TABLE planner ADD CONSTRAINT FK_95517761A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE social_media ADD CONSTRAINT FK_20BC159EA76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE planner DROP FOREIGN KEY FK_9551776164AE4959');
        $this->addSql('DROP TABLE planner');
        $this->addSql('DROP TABLE social_media');
    }
}
