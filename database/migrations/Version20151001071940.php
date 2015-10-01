<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20151001071940 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX idx_885dbafa12fd6cb9 ON posts');
        $this->addSql('CREATE FULLTEXT INDEX MYIDX_POST_BODY ON posts (post_body)');
        $this->addSql('DROP INDEX idx_885dbafa2b36786b ON posts');
        $this->addSql('CREATE INDEX MYIDX_POST_TTL ON posts (title)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX myidx_post_ttl ON posts');
        $this->addSql('CREATE INDEX IDX_885DBAFA2B36786B ON posts (title)');
        $this->addSql('DROP INDEX myidx_post_body ON posts');
        $this->addSql('CREATE FULLTEXT INDEX IDX_885DBAFA12FD6CB9 ON posts (post_body)');
    }
}
