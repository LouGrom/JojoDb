<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200908150917 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` CHANGE age age INT DEFAULT NULL, CHANGE size size DOUBLE PRECISION DEFAULT NULL, CHANGE description description LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE season CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE stand CHANGE description description LONGTEXT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `character` CHANGE age age INT NOT NULL, CHANGE size size DOUBLE PRECISION NOT NULL, CHANGE description description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE season CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE stand CHANGE description description LONGTEXT CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`');
    }
}
