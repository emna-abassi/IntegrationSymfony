<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210721165053 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE penality ADD user_quality_id INT NOT NULL');
        $this->addSql('ALTER TABLE penality ADD CONSTRAINT FK_D22CD0121B9BABBB FOREIGN KEY (user_quality_id) REFERENCES user_quality (id)');
        $this->addSql('CREATE INDEX IDX_D22CD0121B9BABBB ON penality (user_quality_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE penality DROP FOREIGN KEY FK_D22CD0121B9BABBB');
        $this->addSql('DROP INDEX IDX_D22CD0121B9BABBB ON penality');
        $this->addSql('ALTER TABLE penality DROP user_quality_id');
    }
}
