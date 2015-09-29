<?php

namespace Database\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema as Schema;

class Version20150929113214 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE staffs (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, short_bio LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE teams (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE player_associations (team_id INT NOT NULL, player_id INT NOT NULL, INDEX IDX_91C9493296CD8AE (team_id), INDEX IDX_91C949399E6F5DF (player_id), PRIMARY KEY(team_id, player_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE players (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, short_bio LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE staff_associations (staff_id INT NOT NULL, team_id INT NOT NULL, role VARCHAR(255) NOT NULL, INDEX IDX_CB5C6D9D4D57CD (staff_id), INDEX IDX_CB5C6D9296CD8AE (team_id), PRIMARY KEY(staff_id, team_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE player_associations ADD CONSTRAINT FK_91C9493296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE player_associations ADD CONSTRAINT FK_91C949399E6F5DF FOREIGN KEY (player_id) REFERENCES players (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE staff_associations ADD CONSTRAINT FK_CB5C6D9D4D57CD FOREIGN KEY (staff_id) REFERENCES staffs (id)');
        $this->addSql('ALTER TABLE staff_associations ADD CONSTRAINT FK_CB5C6D9296CD8AE FOREIGN KEY (team_id) REFERENCES teams (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE staff_associations DROP FOREIGN KEY FK_CB5C6D9D4D57CD');
        $this->addSql('ALTER TABLE player_associations DROP FOREIGN KEY FK_91C9493296CD8AE');
        $this->addSql('ALTER TABLE staff_associations DROP FOREIGN KEY FK_CB5C6D9296CD8AE');
        $this->addSql('ALTER TABLE player_associations DROP FOREIGN KEY FK_91C949399E6F5DF');
        $this->addSql('DROP TABLE staffs');
        $this->addSql('DROP TABLE teams');
        $this->addSql('DROP TABLE player_associations');
        $this->addSql('DROP TABLE players');
        $this->addSql('DROP TABLE staff_associations');
    }
}
