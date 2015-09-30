<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20150930063735 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE attributes (id INT AUTO_INCREMENT NOT NULL, `key` VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, owner_id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE posts (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, post_slug VARCHAR(255) NOT NULL, post_body LONGTEXT NOT NULL, type VARCHAR(255) NOT NULL, tags VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_885DBAFA51C8FC69 (post_slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE football_events (id INT AUTO_INCREMENT NOT NULL, taxonomy_id INT NOT NULL, parent_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, short_description LONGTEXT DEFAULT NULL, post_slug VARCHAR(255) NOT NULL, event_start_date DATE NOT NULL, event_end_date DATE NOT NULL, UNIQUE INDEX UNIQ_5FC7F48D51C8FC69 (post_slug), INDEX IDX_5FC7F48D9557E6F6 (taxonomy_id), INDEX IDX_5FC7F48D727ACA70 (parent_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE football_events ADD CONSTRAINT FK_5FC7F48D9557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomies (id)');
        $this->addSql('ALTER TABLE football_events ADD CONSTRAINT FK_5FC7F48D727ACA70 FOREIGN KEY (parent_id) REFERENCES football_events (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE football_events DROP FOREIGN KEY FK_5FC7F48D727ACA70');
        $this->addSql('DROP TABLE attributes');
        $this->addSql('DROP TABLE posts');
        $this->addSql('DROP TABLE football_events');
    }
}
