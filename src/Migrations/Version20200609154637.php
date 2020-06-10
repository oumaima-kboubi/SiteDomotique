<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200609154637 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('ALTER TABLE actionneur ADD created_at DATETIME NOT NULL, CHANGE scenario_en_execution_id scenario_en_execution_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE appareil ADD created_at DATETIME NOT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE administrateur ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD photo VARCHAR(255) DEFAULT NULL, DROP login, CHANGE email email VARCHAR(180) NOT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL, CHANGE linked_in linked_in VARCHAR(255) DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32EB52E892FC23A8 ON administrateur (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32EB52E8A0D96FBF ON administrateur (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_32EB52E8C05FB297 ON administrateur (confirmation_token)');
        $this->addSql('ALTER TABLE fos_user ADD langue VARCHAR(255) NOT NULL, ADD nom VARCHAR(50) NOT NULL, ADD prenom VARCHAR(50) NOT NULL, ADD photo VARCHAR(255) DEFAULT NULL, ADD created_at DATETIME NOT NULL, ADD modified_at DATETIME DEFAULT NULL, CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE capteur ADD created_at DATETIME NOT NULL, CHANGE piece_id piece_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE machine CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE piece_id piece_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur_consommation_electrique CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur_consommation_thermique CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE etat CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE habitant ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD photo VARCHAR(255) DEFAULT NULL, DROP login, CHANGE email email VARCHAR(180) NOT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BADFD8B92FC23A8 ON habitant (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BADFD8BA0D96FBF ON habitant (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9BADFD8BC05FB297 ON habitant (confirmation_token)');
        $this->addSql('ALTER TABLE lampe CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE metrique CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD username VARCHAR(180) NOT NULL, ADD username_canonical VARCHAR(180) NOT NULL, ADD email_canonical VARCHAR(180) NOT NULL, ADD enabled TINYINT(1) NOT NULL, ADD salt VARCHAR(255) DEFAULT NULL, ADD last_login DATETIME DEFAULT NULL, ADD confirmation_token VARCHAR(180) DEFAULT NULL, ADD password_requested_at DATETIME DEFAULT NULL, ADD roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', ADD photo VARCHAR(255) DEFAULT NULL, DROP login, CHANGE email email VARCHAR(180) NOT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL, CHANGE telephone telephone INT DEFAULT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D692FC23A8 ON proprietaire (username_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D6A0D96FBF ON proprietaire (email_canonical)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_69E399D6C05FB297 ON proprietaire (confirmation_token)');
        $this->addSql('ALTER TABLE scenario_eclairage CHANGE lampe_id lampe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_store CHANGE store_id store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_temp CHANGE thermostat_id thermostat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_volet CHANGE volet_id volet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE smart_home CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thermostat CHANGE centrale_alarme_id centrale_alarme_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, nom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, prenom VARCHAR(50) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, password VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT \'NULL\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE `utf8_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE actionneur DROP created_at, CHANGE scenario_en_execution_id scenario_en_execution_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_32EB52E892FC23A8 ON administrateur');
        $this->addSql('DROP INDEX UNIQ_32EB52E8A0D96FBF ON administrateur');
        $this->addSql('DROP INDEX UNIQ_32EB52E8C05FB297 ON administrateur');
        $this->addSql('ALTER TABLE administrateur ADD login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP username, DROP username_canonical, DROP email_canonical, DROP enabled, DROP salt, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, DROP photo, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\', CHANGE linked_in linked_in VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE appareil DROP created_at, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE capteur DROP created_at, CHANGE piece_id piece_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE compteur CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE compteur_consommation_electrique CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE compteur_consommation_thermique CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE etat CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fos_user DROP langue, DROP nom, DROP prenom, DROP photo, DROP created_at, DROP modified_at, CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_9BADFD8B92FC23A8 ON habitant');
        $this->addSql('DROP INDEX UNIQ_9BADFD8BA0D96FBF ON habitant');
        $this->addSql('DROP INDEX UNIQ_9BADFD8BC05FB297 ON habitant');
        $this->addSql('ALTER TABLE habitant ADD login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP username, DROP username_canonical, DROP email_canonical, DROP enabled, DROP salt, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, DROP photo, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE lampe CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE machine CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE piece_id piece_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE metrique CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('DROP INDEX UNIQ_69E399D692FC23A8 ON proprietaire');
        $this->addSql('DROP INDEX UNIQ_69E399D6A0D96FBF ON proprietaire');
        $this->addSql('DROP INDEX UNIQ_69E399D6C05FB297 ON proprietaire');
        $this->addSql('ALTER TABLE proprietaire ADD login VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, DROP username, DROP username_canonical, DROP email_canonical, DROP enabled, DROP salt, DROP last_login, DROP confirmation_token, DROP password_requested_at, DROP roles, DROP photo, CHANGE email email VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\', CHANGE telephone telephone INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_eclairage CHANGE lampe_id lampe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_store CHANGE store_id store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_temp CHANGE thermostat_id thermostat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_volet CHANGE volet_id volet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE smart_home CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thermostat CHANGE centrale_alarme_id centrale_alarme_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
    }
}
