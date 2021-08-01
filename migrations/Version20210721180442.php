<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721180442 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE canceled_reservation (id INT AUTO_INCREMENT NOT NULL, reservation_id_id INT DEFAULT NULL, price INT NOT NULL, date DATE NOT NULL, UNIQUE INDEX UNIQ_8C83AB33C3B4EF0 (reservation_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE canceled_reservation ADD CONSTRAINT FK_8C83AB33C3B4EF0 FOREIGN KEY (reservation_id_id) REFERENCES reservation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE canceled_reservation');
    }
}
