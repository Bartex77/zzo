<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200226105508 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE service_action (id INT AUTO_INCREMENT NOT NULL, time_interval_id INT NOT NULL, preservative_product_id INT NOT NULL, name VARCHAR(255) NOT NULL, performed_by_producer TINYINT(1) NOT NULL, preservative_product_amount DOUBLE PRECISION DEFAULT NULL, INDEX IDX_790B89A48E6930C7 (time_interval_id), INDEX IDX_790B89A4BBFAA192 (preservative_product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE service_action ADD CONSTRAINT FK_790B89A48E6930C7 FOREIGN KEY (time_interval_id) REFERENCES time_interval (id)');
        $this->addSql('ALTER TABLE service_action ADD CONSTRAINT FK_790B89A4BBFAA192 FOREIGN KEY (preservative_product_id) REFERENCES preservative_product (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE service_action');
    }
}
