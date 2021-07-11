<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210711215112 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE category_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dish_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE event_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE information_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE reservation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE tablee_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE userrr_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE category (id INT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE dish (id INT NOT NULL, categrory_id INT NOT NULL, name VARCHAR(255) NOT NULL, price DOUBLE PRECISION NOT NULL, description VARCHAR(255) DEFAULT NULL, image VARCHAR(255) NOT NULL, update_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_957D8CB884B45D2 ON dish (categrory_id)');
        $this->addSql('CREATE TABLE event (id INT NOT NULL, name VARCHAR(255) NOT NULL, description TEXT NOT NULL, image VARCHAR(255) NOT NULL, star_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE event_table (event_id INT NOT NULL, table_id INT NOT NULL, PRIMARY KEY(event_id, table_id))');
        $this->addSql('CREATE INDEX IDX_B7323E6A71F7E88B ON event_table (event_id)');
        $this->addSql('CREATE INDEX IDX_B7323E6AECFF285C ON event_table (table_id)');
        $this->addSql('CREATE TABLE information (id INT NOT NULL, open_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, close_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, phone_number VARCHAR(15) NOT NULL, email VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION DEFAULT NULL, longitude DOUBLE PRECISION DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE reservation (id INT NOT NULL, event_id INT NOT NULL, first_name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, phone_number VARCHAR(255) NOT NULL, status BOOLEAN NOT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_42C8495571F7E88B ON reservation (event_id)');
        $this->addSql('CREATE TABLE reservation_table (reservation_id INT NOT NULL, table_id INT NOT NULL, PRIMARY KEY(reservation_id, table_id))');
        $this->addSql('CREATE INDEX IDX_B5565FE1B83297E7 ON reservation_table (reservation_id)');
        $this->addSql('CREATE INDEX IDX_B5565FE1ECFF285C ON reservation_table (table_id)');
        $this->addSql('CREATE TABLE tablee (id INT NOT NULL, number INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE TABLE userrr (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_ACD017A5F85E0677 ON userrr (username)');
        $this->addSql('ALTER TABLE dish ADD CONSTRAINT FK_957D8CB884B45D2 FOREIGN KEY (categrory_id) REFERENCES category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_table ADD CONSTRAINT FK_B7323E6A71F7E88B FOREIGN KEY (event_id) REFERENCES event (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_table ADD CONSTRAINT FK_B7323E6AECFF285C FOREIGN KEY (table_id) REFERENCES tablee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C8495571F7E88B FOREIGN KEY (event_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation_table ADD CONSTRAINT FK_B5565FE1B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE reservation_table ADD CONSTRAINT FK_B5565FE1ECFF285C FOREIGN KEY (table_id) REFERENCES tablee (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE dish DROP CONSTRAINT FK_957D8CB884B45D2');
        $this->addSql('ALTER TABLE event_table DROP CONSTRAINT FK_B7323E6A71F7E88B');
        $this->addSql('ALTER TABLE reservation DROP CONSTRAINT FK_42C8495571F7E88B');
        $this->addSql('ALTER TABLE reservation_table DROP CONSTRAINT FK_B5565FE1B83297E7');
        $this->addSql('ALTER TABLE event_table DROP CONSTRAINT FK_B7323E6AECFF285C');
        $this->addSql('ALTER TABLE reservation_table DROP CONSTRAINT FK_B5565FE1ECFF285C');
        $this->addSql('DROP SEQUENCE category_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dish_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE event_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE information_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE reservation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE tablee_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE userrr_id_seq CASCADE');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE dish');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_table');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE reservation_table');
        $this->addSql('DROP TABLE tablee');
        $this->addSql('DROP TABLE userrr');
    }
}
