<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220225945 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE `interval` DROP FOREIGN KEY FK_19C6EFCBAC3AD16B');
        $this->addSql('DROP TABLE time_unit');
        $this->addSql('DROP INDEX IDX_19C6EFCBAC3AD16B ON `interval`');
        $this->addSql('ALTER TABLE `interval` ADD time_unit VARCHAR(1) NOT NULL, DROP time_unit_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE time_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, symbol VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE `interval` ADD time_unit_id INT NOT NULL, DROP time_unit');
        $this->addSql('ALTER TABLE `interval` ADD CONSTRAINT FK_19C6EFCBAC3AD16B FOREIGN KEY (time_unit_id) REFERENCES time_unit (id)');
        $this->addSql('CREATE INDEX IDX_19C6EFCBAC3AD16B ON `interval` (time_unit_id)');
    }
}
