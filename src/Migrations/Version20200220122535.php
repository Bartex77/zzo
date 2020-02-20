<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220122535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, equipment_producer_id INT DEFAULT NULL, equipment_type_id INT NOT NULL, name VARCHAR(255) NOT NULL, number VARCHAR(255) NOT NULL, INDEX IDX_D338D583E8F4ACD9 (equipment_producer_id), INDEX IDX_D338D583B337437C (equipment_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_producer (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `interval` (id INT AUTO_INCREMENT NOT NULL, time_unit_id INT NOT NULL, name VARCHAR(255) NOT NULL, value DOUBLE PRECISION NOT NULL, INDEX IDX_19C6EFCBAC3AD16B (time_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preservative_material (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preservative_material_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE preservative_product (id INT AUTO_INCREMENT NOT NULL, preservative_material_id INT NOT NULL, preservative_material_unit_id INT NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_F72E820D7649982A (preservative_material_id), INDEX IDX_F72E820DDB138AC5 (preservative_material_unit_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE time_unit (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, symbol VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583E8F4ACD9 FOREIGN KEY (equipment_producer_id) REFERENCES equipment_producer (id)');
        $this->addSql('ALTER TABLE equipment ADD CONSTRAINT FK_D338D583B337437C FOREIGN KEY (equipment_type_id) REFERENCES equipment_type (id)');
        $this->addSql('ALTER TABLE `interval` ADD CONSTRAINT FK_19C6EFCBAC3AD16B FOREIGN KEY (time_unit_id) REFERENCES time_unit (id)');
        $this->addSql('ALTER TABLE preservative_product ADD CONSTRAINT FK_F72E820D7649982A FOREIGN KEY (preservative_material_id) REFERENCES preservative_material (id)');
        $this->addSql('ALTER TABLE preservative_product ADD CONSTRAINT FK_F72E820DDB138AC5 FOREIGN KEY (preservative_material_unit_id) REFERENCES preservative_material_unit (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583E8F4ACD9');
        $this->addSql('ALTER TABLE equipment DROP FOREIGN KEY FK_D338D583B337437C');
        $this->addSql('ALTER TABLE preservative_product DROP FOREIGN KEY FK_F72E820D7649982A');
        $this->addSql('ALTER TABLE preservative_product DROP FOREIGN KEY FK_F72E820DDB138AC5');
        $this->addSql('ALTER TABLE `interval` DROP FOREIGN KEY FK_19C6EFCBAC3AD16B');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE equipment_producer');
        $this->addSql('DROP TABLE equipment_type');
        $this->addSql('DROP TABLE `interval`');
        $this->addSql('DROP TABLE preservative_material');
        $this->addSql('DROP TABLE preservative_material_unit');
        $this->addSql('DROP TABLE preservative_product');
        $this->addSql('DROP TABLE time_unit');
    }
}
