<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241020220754 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE petite_enfance (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) DEFAULT NULL, profession VARCHAR(255) DEFAULT NULL, profil LONGTEXT NOT NULL, langue_une VARCHAR(255) DEFAULT NULL, langue_deux VARCHAR(255) DEFAULT NULL, competence_une VARCHAR(255) DEFAULT NULL, competence_deux VARCHAR(255) DEFAULT NULL, competence_trois VARCHAR(255) DEFAULT NULL, competence_quatre VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, liensite VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, emaildeux VARCHAR(255) DEFAULT NULL, etude VARCHAR(255) DEFAULT NULL, anneeetude VARCHAR(255) DEFAULT NULL, diplome_un VARCHAR(255) DEFAULT NULL, diplome_deux VARCHAR(255) DEFAULT NULL, diplome_trois VARCHAR(255) DEFAULT NULL, nomtravail VARCHAR(255) DEFAULT NULL, annéetravail VARCHAR(255) DEFAULT NULL, travail_un VARCHAR(255) DEFAULT NULL, travail_deux VARCHAR(255) DEFAULT NULL, travail_trois VARCHAR(255) DEFAULT NULL, nomtravailledeux VARCHAR(255) DEFAULT NULL, anneetravailledeux VARCHAR(255) DEFAULT NULL, descriptiontravailledeux VARCHAR(255) DEFAULT NULL, descriptiontravailletrois VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE petite_enfance');
    }
}
