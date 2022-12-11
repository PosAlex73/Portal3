<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221211062858 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE app_new_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE article_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE article_comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE catetory_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE change_log_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE course_comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "order_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE setting_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE subscription_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE task_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE task_comment_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_links_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_profile_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_progress_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE user_settings_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE app_new (id INT NOT NULL, title VARCHAR(255) NOT NULL, text TEXT NOT NULL, status VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE article (id INT NOT NULL, title VARCHAR(255) NOT NULL, text TEXT NOT NULL, status VARCHAR(1) NOT NULL, type VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE article_comment (id INT NOT NULL, user_id_id INT NOT NULL, article_id INT NOT NULL, message VARCHAR(1024) NOT NULL, status VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_79A616DB9D86650F ON article_comment (user_id_id)');
        $this->addSql('CREATE INDEX IDX_79A616DB7294869C ON article_comment (article_id)');
        $this->addSql('CREATE TABLE catetory (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT DEFAULT NULL, status VARCHAR(1) NOT NULL, type VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE change_log (id INT NOT NULL, title VARCHAR(255) NOT NULL, text TEXT NOT NULL, status VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, release VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE course (id INT NOT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, status VARCHAR(1) NOT NULL, type VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE course_catetory (course_id INT NOT NULL, catetory_id INT NOT NULL, PRIMARY KEY(course_id, catetory_id))');
        $this->addSql('CREATE INDEX IDX_ED548CE6591CC992 ON course_catetory (course_id)');
        $this->addSql('CREATE INDEX IDX_ED548CE644701BB1 ON course_catetory (catetory_id)');
        $this->addSql('CREATE TABLE course_comment (id INT NOT NULL, course_id INT DEFAULT NULL, user_id_id INT DEFAULT NULL, message VARCHAR(1024) NOT NULL, status VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_9CB75780591CC992 ON course_comment (course_id)');
        $this->addSql('CREATE INDEX IDX_9CB757809D86650F ON course_comment (user_id_id)');
        $this->addSql('CREATE TABLE "order" (id INT NOT NULL, user_id_id INT DEFAULT NULL, payment VARCHAR(1024) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(1) NOT NULL, data TEXT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F52993989D86650F ON "order" (user_id_id)');
        $this->addSql('CREATE TABLE setting (id INT NOT NULL, title VARCHAR(255) NOT NULL, type VARCHAR(1) NOT NULL, value VARCHAR(4096) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE subscription (id INT NOT NULL, user_id_id INT NOT NULL, status VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, datetime TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, type VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_A3C664D39D86650F ON subscription (user_id_id)');
        $this->addSql('CREATE TABLE task (id INT NOT NULL, course_id INT DEFAULT NULL, title VARCHAR(255) NOT NULL, description TEXT NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(1) NOT NULL, type VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_527EDB25591CC992 ON task (course_id)');
        $this->addSql('CREATE TABLE task_comment (id INT NOT NULL, user_id_id INT DEFAULT NULL, message VARCHAR(1024) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, status VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_8B9578869D86650F ON task_comment (user_id_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, firstname VARCHAR(255) NOT NULL, lastname VARCHAR(255) NOT NULL, status VARCHAR(1) NOT NULL, type VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649E7927C74 ON "user" (email)');
        $this->addSql('CREATE TABLE user_links (id INT NOT NULL, user_id_id INT DEFAULT NULL, title VARCHAR(1024) NOT NULL, description VARCHAR(2048) DEFAULT NULL, link VARCHAR(1024) NOT NULL, status VARCHAR(1) NOT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_33405A409D86650F ON user_links (user_id_id)');
        $this->addSql('CREATE TABLE user_profile (id INT NOT NULL, user_id_id INT DEFAULT NULL, age INT DEFAULT NULL, public_email VARCHAR(255) DEFAULT NULL, country VARCHAR(2) DEFAULT NULL, experience INT DEFAULT NULL, about TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D95AB4059D86650F ON user_profile (user_id_id)');
        $this->addSql('CREATE TABLE user_progress (id INT NOT NULL, user_id_id INT NOT NULL, course_id INT NOT NULL, data TEXT DEFAULT NULL, created TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, updated TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_C28C16469D86650F ON user_progress (user_id_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_C28C1646591CC992 ON user_progress (course_id)');
        $this->addSql('CREATE TABLE user_settings (id INT NOT NULL, user_id_id INT NOT NULL, get_admin_notifications VARCHAR(1) NOT NULL, get_news_notifications VARCHAR(1) NOT NULL, show_progress VARCHAR(1) NOT NULL, show_public_profile VARCHAR(1) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5C844C59D86650F ON user_settings (user_id_id)');
        $this->addSql('CREATE TABLE messenger_messages (id BIGSERIAL NOT NULL, body TEXT NOT NULL, headers TEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, available_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, delivered_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_75EA56E0FB7336F0 ON messenger_messages (queue_name)');
        $this->addSql('CREATE INDEX IDX_75EA56E0E3BD61CE ON messenger_messages (available_at)');
        $this->addSql('CREATE INDEX IDX_75EA56E016BA31DB ON messenger_messages (delivered_at)');
        $this->addSql('CREATE OR REPLACE FUNCTION notify_messenger_messages() RETURNS TRIGGER AS $$
            BEGIN
                PERFORM pg_notify(\'messenger_messages\', NEW.queue_name::text);
                RETURN NEW;
            END;
        $$ LANGUAGE plpgsql;');
        $this->addSql('DROP TRIGGER IF EXISTS notify_trigger ON messenger_messages;');
        $this->addSql('CREATE TRIGGER notify_trigger AFTER INSERT OR UPDATE ON messenger_messages FOR EACH ROW EXECUTE PROCEDURE notify_messenger_messages();');
        $this->addSql('ALTER TABLE article_comment ADD CONSTRAINT FK_79A616DB9D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE article_comment ADD CONSTRAINT FK_79A616DB7294869C FOREIGN KEY (article_id) REFERENCES article (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_catetory ADD CONSTRAINT FK_ED548CE6591CC992 FOREIGN KEY (course_id) REFERENCES course (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_catetory ADD CONSTRAINT FK_ED548CE644701BB1 FOREIGN KEY (catetory_id) REFERENCES catetory (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_comment ADD CONSTRAINT FK_9CB75780591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE course_comment ADD CONSTRAINT FK_9CB757809D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE "order" ADD CONSTRAINT FK_F52993989D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D39D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task ADD CONSTRAINT FK_527EDB25591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE task_comment ADD CONSTRAINT FK_8B9578869D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_links ADD CONSTRAINT FK_33405A409D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_profile ADD CONSTRAINT FK_D95AB4059D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_progress ADD CONSTRAINT FK_C28C16469D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_progress ADD CONSTRAINT FK_C28C1646591CC992 FOREIGN KEY (course_id) REFERENCES course (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE user_settings ADD CONSTRAINT FK_5C844C59D86650F FOREIGN KEY (user_id_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE app_new_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE article_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE article_comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE catetory_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE change_log_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE course_comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "order_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE setting_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE subscription_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE task_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE task_comment_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP SEQUENCE user_links_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_profile_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_progress_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE user_settings_id_seq CASCADE');
        $this->addSql('ALTER TABLE article_comment DROP CONSTRAINT FK_79A616DB9D86650F');
        $this->addSql('ALTER TABLE article_comment DROP CONSTRAINT FK_79A616DB7294869C');
        $this->addSql('ALTER TABLE course_catetory DROP CONSTRAINT FK_ED548CE6591CC992');
        $this->addSql('ALTER TABLE course_catetory DROP CONSTRAINT FK_ED548CE644701BB1');
        $this->addSql('ALTER TABLE course_comment DROP CONSTRAINT FK_9CB75780591CC992');
        $this->addSql('ALTER TABLE course_comment DROP CONSTRAINT FK_9CB757809D86650F');
        $this->addSql('ALTER TABLE "order" DROP CONSTRAINT FK_F52993989D86650F');
        $this->addSql('ALTER TABLE subscription DROP CONSTRAINT FK_A3C664D39D86650F');
        $this->addSql('ALTER TABLE task DROP CONSTRAINT FK_527EDB25591CC992');
        $this->addSql('ALTER TABLE task_comment DROP CONSTRAINT FK_8B9578869D86650F');
        $this->addSql('ALTER TABLE user_links DROP CONSTRAINT FK_33405A409D86650F');
        $this->addSql('ALTER TABLE user_profile DROP CONSTRAINT FK_D95AB4059D86650F');
        $this->addSql('ALTER TABLE user_progress DROP CONSTRAINT FK_C28C16469D86650F');
        $this->addSql('ALTER TABLE user_progress DROP CONSTRAINT FK_C28C1646591CC992');
        $this->addSql('ALTER TABLE user_settings DROP CONSTRAINT FK_5C844C59D86650F');
        $this->addSql('DROP TABLE app_new');
        $this->addSql('DROP TABLE article');
        $this->addSql('DROP TABLE article_comment');
        $this->addSql('DROP TABLE catetory');
        $this->addSql('DROP TABLE change_log');
        $this->addSql('DROP TABLE course');
        $this->addSql('DROP TABLE course_catetory');
        $this->addSql('DROP TABLE course_comment');
        $this->addSql('DROP TABLE "order"');
        $this->addSql('DROP TABLE setting');
        $this->addSql('DROP TABLE subscription');
        $this->addSql('DROP TABLE task');
        $this->addSql('DROP TABLE task_comment');
        $this->addSql('DROP TABLE "user"');
        $this->addSql('DROP TABLE user_links');
        $this->addSql('DROP TABLE user_profile');
        $this->addSql('DROP TABLE user_progress');
        $this->addSql('DROP TABLE user_settings');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
