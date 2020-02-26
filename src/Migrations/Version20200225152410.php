<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200225152410 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583E8F4ACD9');
        $this->addSql('DROP INDEX IDX_D338D583E8F4ACD9 ON equipment');
        $this->addSql('ALTER TABLE equipment DROP equipment_producer_id');
        $this->addSql('ALTER TABLE equipment_type ADD equipment_producer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipment_type ADD CONSTRAINT FK_B65A862FE8F4ACD9 FOREIGN KEY (equipment_producer_id) REFERENCES equipment_producer (id)');
        $this->addSql('CREATE INDEX IDX_B65A862FE8F4ACD9 ON equipment_type (equipment_producer_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipment ADD equipment_producer_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583E8F4ACD9 FOREIGN KEY (equipment_producer_id) REFERENCES equipment_producer (id)');
        $this->addSql('CREATE INDEX IDX_D338D583E8F4ACD9 ON equipment (equipment_producer_id)');
        $this->addSql('ALTER TABLE equipment_type DROP FOREIGN KEY FK_B65A862FE8F4ACD9');
        $this->addSql('DROP INDEX IDX_B65A862FE8F4ACD9 ON equipment_type');
        $this->addSql('ALTER TABLE equipment_type DROP equipment_producer_id');
    }
}
