<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210722100856 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation ADD pick_up_date DATE NOT NULL, ADD pick_up_time DATETIME NOT NULL, ADD book_return VARCHAR(255) NOT NULL, ADD return_date DATE NOT NULL, ADD return_time DATETIME NOT NULL, ADD expire_date_time DATETIME NOT NULL, ADD origin VARCHAR(255) NOT NULL, ADD destination VARCHAR(255) NOT NULL, ADD price INT NOT NULL, ADD tva INT NOT NULL, ADD payment_type VARCHAR(255) NOT NULL, ADD nb_persons INT NOT NULL, ADD nb_brief_cases INT NOT NULL, ADD vol_number INT NOT NULL, ADD gamme VARCHAR(255) NOT NULL, ADD vehicle VARCHAR(255) NOT NULL, ADD vehicle_pic LONGTEXT NOT NULL, ADD nb_km INT NOT NULL, ADD nb_hours INT NOT NULL, ADD estimated_time TIME NOT NULL, ADD extra_infos LONGTEXT NOT NULL, ADD order_path VARCHAR(255) NOT NULL, ADD status VARCHAR(255) NOT NULL, ADD done VARCHAR(255) NOT NULL, ADD way VARCHAR(255) NOT NULL, ADD ref INT NOT NULL, ADD extras VARCHAR(255) NOT NULL, ADD pickup_position VARCHAR(255) NOT NULL, ADD pickoff_position VARCHAR(255) NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reservation DROP pick_up_date, DROP pick_up_time, DROP book_return, DROP return_date, DROP return_time, DROP expire_date_time, DROP origin, DROP destination, DROP price, DROP tva, DROP payment_type, DROP nb_persons, DROP nb_brief_cases, DROP vol_number, DROP gamme, DROP vehicle, DROP vehicle_pic, DROP nb_km, DROP nb_hours, DROP estimated_time, DROP extra_infos, DROP order_path, DROP status, DROP done, DROP way, DROP ref, DROP extras, DROP pickup_position, DROP pickoff_position');
    }
}
