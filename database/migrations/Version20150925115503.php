<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20150925115503 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE terms (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_88A23F71989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomies (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_232B80F95E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE taxonomy_trees (taxonomy_id INT NOT NULL, term_id INT NOT NULL, INDEX IDX_C1BBAB079557E6F6 (taxonomy_id), INDEX IDX_C1BBAB07E2C35FC (term_id), PRIMARY KEY(taxonomy_id, term_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE taxonomy_trees ADD CONSTRAINT FK_C1BBAB079557E6F6 FOREIGN KEY (taxonomy_id) REFERENCES taxonomies (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE taxonomy_trees ADD CONSTRAINT FK_C1BBAB07E2C35FC FOREIGN KEY (term_id) REFERENCES terms (id) ON DELETE CASCADE');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE taxonomy_trees DROP FOREIGN KEY FK_C1BBAB07E2C35FC');
        $this->addSql('ALTER TABLE taxonomy_trees DROP FOREIGN KEY FK_C1BBAB079557E6F6');
        $this->addSql('DROP TABLE terms');
        $this->addSql('DROP TABLE taxonomies');
        $this->addSql('DROP TABLE taxonomy_trees');
    }
}
