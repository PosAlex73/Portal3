<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221209192547 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE user_settings_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_settings (id INT NOT NULL, user_id_id INT NOT NULL, get_admin_notifications VARCHAR(1) NOT NULL, get_news_notifications VARCHAR(1) NOT NULL, show_progress VARCHAR(1) NOT NULL, show_public_profile VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5C844C59D86650F ON user_settings (user_id_id)');
        $this->addSql('ALTER TABLE user_settings ADD CONSTRAINT FK_5C844C59D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE user_settings_id_seq CASCADE');
        $this->addSql('ALTER TABLE user_settings DROP CONSTRAINT FK_5C844C59D86650F');
        $this->addSql('DROP TABLE user_settings');
    }
}
