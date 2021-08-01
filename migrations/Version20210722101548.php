<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722101548 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE penality ADD reservation_id INT NOT NULL');
        $this->addSql('ALTER TABLE penality ADD CONSTRAINT FK_D22CD012B83297E7 FOREIGN KEY (reservation_id) REFERENCES reservation (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D22CD012B83297E7 ON penality (reservation_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE penality DROP FOREIGN KEY FK_D22CD012B83297E7');
        $this->addSql('DROP INDEX UNIQ_D22CD012B83297E7 ON penality');
        $this->addSql('ALTER TABLE penality DROP reservation_id');
    }
}
