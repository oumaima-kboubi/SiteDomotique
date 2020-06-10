<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608182055 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actionneur CHANGE scenario_en_execution_id scenario_en_execution_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE appareil CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE administrateur ADD photo VARCHAR(255) DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL, CHANGE linked_in linked_in VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur ADD photo VARCHAR(255) DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE capteur CHANGE piece_id piece_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE machine CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE piece_id piece_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur_consommation_electrique CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE compteur_consommation_thermique CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE etat CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE habitant ADD photo VARCHAR(255) DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE lampe CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE metrique CHANGE modified_at modified_at DATETIME DEFAULT NULL');
        $this->addSql('ALTER TABLE proprietaire ADD photo VARCHAR(255) DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT NULL, CHANGE telephone telephone INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_eclairage CHANGE lampe_id lampe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_store CHANGE store_id store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_temp CHANGE thermostat_id thermostat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_volet CHANGE volet_id volet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE smart_home CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thermostat CHANGE centrale_alarme_id centrale_alarme_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE actionneur CHANGE scenario_en_execution_id scenario_en_execution_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE administrateur DROP photo, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\', CHANGE linked_in linked_in VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE appareil CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE capteur CHANGE piece_id piece_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE compteur CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE compteur_consommation_electrique CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE compteur_consommation_thermique CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE etat CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE habitant DROP photo, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE lampe CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE machine CHANGE actionneur_id actionneur_id INT DEFAULT NULL, CHANGE piece_id piece_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE metrique CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE proprietaire DROP photo, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\', CHANGE telephone telephone INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_eclairage CHANGE lampe_id lampe_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_store CHANGE store_id store_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_temp CHANGE thermostat_id thermostat_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE scenario_volet CHANGE volet_id volet_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE smart_home CHANGE compteur_consommation_electrique_id compteur_consommation_electrique_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE thermostat CHANGE centrale_alarme_id centrale_alarme_id INT DEFAULT NULL, CHANGE compteur_consommation_thermique_id compteur_consommation_thermique_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE utilisateur DROP photo, CHANGE modified_at modified_at DATETIME DEFAULT \'NULL\'');
    }
}
