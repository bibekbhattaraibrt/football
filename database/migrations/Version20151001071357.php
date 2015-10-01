<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20151001071357 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE INDEX MYIDX_ATTR_KEY ON attributes (`key`)');
        $this->addSql('DROP INDEX UNIQ_5FC7F48D51C8FC69 ON football_events');
        $this->addSql('ALTER TABLE football_events CHANGE taxonomy_id taxonomy_id INT DEFAULT NULL, CHANGE post_slug slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FC7F48D989D9B62 ON football_events (slug)');
        $this->addSql('CREATE INDEX MYIDX_EVT_NAME ON football_events (name)');
        $this->addSql('CREATE INDEX MYIDX_PLRS_NAME ON players (name)');
        $this->addSql('DROP INDEX UNIQ_885DBAFA51C8FC69 ON posts');
        $this->addSql('ALTER TABLE posts CHANGE post_slug slug VARCHAR(255) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_885DBAFA989D9B62 ON posts (slug)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_885DBAFA12FD6CB9 ON posts (post_body)');
        $this->addSql('CREATE INDEX IDX_885DBAFA2B36786B ON posts (title)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX MYIDX_ATTR_KEY ON attributes');
        $this->addSql('DROP INDEX UNIQ_5FC7F48D989D9B62 ON football_events');
        $this->addSql('DROP INDEX MYIDX_EVT_NAME ON football_events');
        $this->addSql('ALTER TABLE football_events CHANGE taxonomy_id taxonomy_id INT NOT NULL, CHANGE slug post_slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_5FC7F48D51C8FC69 ON football_events (post_slug)');
        $this->addSql('DROP INDEX MYIDX_PLRS_NAME ON players');
        $this->addSql('DROP INDEX UNIQ_885DBAFA989D9B62 ON posts');
        $this->addSql('DROP INDEX IDX_885DBAFA12FD6CB9 ON posts');
        $this->addSql('DROP INDEX IDX_885DBAFA2B36786B ON posts');
        $this->addSql('ALTER TABLE posts CHANGE slug post_slug VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_885DBAFA51C8FC69 ON posts (post_slug)');
    }
}
