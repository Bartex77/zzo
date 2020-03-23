<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200323075915 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE service_action_performed (id INT AUTO_INCREMENT NOT NULL, service_action_date DATETIME NOT NULL, service_action_planned_date DATETIME NOT NULL, comment LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_action_performed_service_action (service_action_performed_id INT NOT NULL, service_action_id INT NOT NULL, INDEX IDX_1B8F70C744FC210A (service_action_performed_id), INDEX IDX_1B8F70C7C5A3CA7F (service_action_id), PRIMARY KEY(service_action_performed_id, service_action_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service_action_performed_worker (service_action_performed_id INT NOT NULL, worker_id INT NOT NULL, INDEX IDX_D3F7A94944FC210A (service_action_performed_id), INDEX IDX_D3F7A9496B20BA36 (worker_id), PRIMARY KEY(service_action_performed_id, worker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE worker (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(30) NOT NULL, last_name VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service_action_performed_service_action ADD CONSTRAINT FK_1B8F70C744FC210A FOREIGN KEY (service_action_performed_id) REFERENCES service_action_performed (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_action_performed_service_action ADD CONSTRAINT FK_1B8F70C7C5A3CA7F FOREIGN KEY (service_action_id) REFERENCES service_action (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_action_performed_worker ADD CONSTRAINT FK_D3F7A94944FC210A FOREIGN KEY (service_action_performed_id) REFERENCES service_action_performed (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE service_action_performed_worker ADD CONSTRAINT FK_D3F7A9496B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE service_action_performed_service_action DROP FOREIGN KEY FK_1B8F70C744FC210A');
        $this->addSql('ALTER TABLE service_action_performed_worker DROP FOREIGN KEY FK_D3F7A94944FC210A');
        $this->addSql('ALTER TABLE service_action_performed_worker DROP FOREIGN KEY FK_D3F7A9496B20BA36');
        $this->addSql('DROP TABLE service_action_performed');
        $this->addSql('DROP TABLE service_action_performed_service_action');
        $this->addSql('DROP TABLE service_action_performed_worker');
        $this->addSql('DROP TABLE worker');
    }
}
