<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200608163924 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE actionneur (id INT AUTO_INCREMENT NOT NULL, scenario_en_execution_id INT DEFAULT NULL, description LONGTEXT NOT NULL, label VARCHAR(100) NOT NULL, modified_at DATETIME DEFAULT NULL, phenomene_physique_utilise VARCHAR(255) NOT NULL, principe_mis_en_oeuvre VARCHAR(255) NOT NULL, type_energie_utilisee VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_28734CFEA0D3138 (scenario_en_execution_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE appareil (id INT AUTO_INCREMENT NOT NULL, description LONGTEXT NOT NULL, label VARCHAR(100) NOT NULL, modified_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE administrateur (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, adresse VARCHAR(255) NOT NULL, fax VARCHAR(255) NOT NULL, linked_in VARCHAR(255) DEFAULT NULL, telephone INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE capteur (id INT AUTO_INCREMENT NOT NULL, piece_id INT DEFAULT NULL, description LONGTEXT NOT NULL, label VARCHAR(100) NOT NULL, modified_at DATETIME DEFAULT NULL, apport_energetique VARCHAR(255) NOT NULL, seuil_declenchement NUMERIC(10, 3) NOT NULL, type_detection VARCHAR(255) NOT NULL, type_sortie VARCHAR(255) NOT NULL, INDEX IDX_5B4A1695C40FCFA8 (piece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE centrale_alarme (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, puissance_absorbee NUMERIC(10, 3) NOT NULL, reference INT NOT NULL, type VARCHAR(255) NOT NULL, alimentation_principale INT NOT NULL, alimentation_secondaire INT NOT NULL, dimensions VARCHAR(255) NOT NULL, nbre_boucles INT NOT NULL, poids INT NOT NULL, UNIQUE INDEX UNIQ_96138AC7AEA34913 (reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE machine (id INT AUTO_INCREMENT NOT NULL, actionneur_id INT DEFAULT NULL, piece_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, puissance_absorbee NUMERIC(10, 3) NOT NULL, reference INT NOT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_1505DF84AEA34913 (reference), UNIQUE INDEX UNIQ_1505DF844CDBBB4D (actionneur_id), INDEX IDX_1505DF84C40FCFA8 (piece_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur (id INT AUTO_INCREMENT NOT NULL, reference INT NOT NULL, seuil_max NUMERIC(10, 3) NOT NULL, value NUMERIC(10, 3) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, UNIQUE INDEX UNIQ_4D021BD5AEA34913 (reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur_consommation_electrique (id INT AUTO_INCREMENT NOT NULL, reference INT NOT NULL, seuil_max NUMERIC(10, 3) NOT NULL, value NUMERIC(10, 3) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, courant_max NUMERIC(10, 3) NOT NULL, courant_min NUMERIC(10, 3) NOT NULL, UNIQUE INDEX UNIQ_78E0609FAEA34913 (reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE compteur_consommation_thermique (id INT AUTO_INCREMENT NOT NULL, reference INT NOT NULL, seuil_max NUMERIC(10, 3) NOT NULL, value NUMERIC(10, 3) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, degre_protection VARCHAR(255) NOT NULL, environnement_de_fctmnt VARCHAR(255) NOT NULL, longueur_cable_calculateur NUMERIC(10, 3) NOT NULL, temp_max NUMERIC(10, 3) NOT NULL, temp_min NUMERIC(10, 3) NOT NULL, UNIQUE INDEX UNIQ_9EBEC638AEA34913 (reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etat (id INT AUTO_INCREMENT NOT NULL, actionneur_id INT DEFAULT NULL, value VARCHAR(30) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, INDEX IDX_55CAF7624CDBBB4D (actionneur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE habitant (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, fuseau_horaire VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lampe (id INT AUTO_INCREMENT NOT NULL, compteur_consommation_electrique_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, puissance_absorbee NUMERIC(10, 3) NOT NULL, reference INT NOT NULL, type VARCHAR(255) NOT NULL, flux_lumineux INT NOT NULL, UNIQUE INDEX UNIQ_4B924965AEA34913 (reference), INDEX IDX_4B92496555F9B35A (compteur_consommation_electrique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE metrique (id INT AUTO_INCREMENT NOT NULL, capteur_id INT NOT NULL, value NUMERIC(10, 3) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, INDEX IDX_986E57B31708A229 (capteur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE piece (id INT AUTO_INCREMENT NOT NULL, smart_home_id INT NOT NULL, nom VARCHAR(100) NOT NULL, INDEX IDX_44CA0B2349B94322 (smart_home_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proprietaire (id INT AUTO_INCREMENT NOT NULL, langue VARCHAR(255) NOT NULL, login VARCHAR(255) NOT NULL, nom VARCHAR(50) NOT NULL, prenom VARCHAR(50) NOT NULL, email VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, modified_at DATETIME DEFAULT NULL, fuseau_horaire VARCHAR(255) NOT NULL, telephone INT DEFAULT NULL, cin INT NOT NULL, UNIQUE INDEX UNIQ_69E399D6ABE530DA (cin), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario (id INT AUTO_INCREMENT NOT NULL, date_debut_activation DATETIME NOT NULL, date_fin_activation DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, is_using_sensor TINYINT(1) NOT NULL, repetition TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_eclairage (id INT AUTO_INCREMENT NOT NULL, lampe_id INT DEFAULT NULL, date_debut_activation DATETIME NOT NULL, date_fin_activation DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, is_using_sensor TINYINT(1) NOT NULL, repetition TINYINT(1) NOT NULL, degre_luminosite NUMERIC(10, 3) NOT NULL, INDEX IDX_B126E48E17E7CA94 (lampe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_store (id INT AUTO_INCREMENT NOT NULL, store_id INT DEFAULT NULL, date_debut_activation DATETIME NOT NULL, date_fin_activation DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, is_using_sensor TINYINT(1) NOT NULL, repetition TINYINT(1) NOT NULL, inclinaison NUMERIC(10, 3) NOT NULL, niveau_ouverture NUMERIC(10, 3) NOT NULL, INDEX IDX_D058E926B092A811 (store_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_temp (id INT AUTO_INCREMENT NOT NULL, thermostat_id INT DEFAULT NULL, date_debut_activation DATETIME NOT NULL, date_fin_activation DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, is_using_sensor TINYINT(1) NOT NULL, repetition TINYINT(1) NOT NULL, seuil_max NUMERIC(10, 3) NOT NULL, seuil_min NUMERIC(10, 3) NOT NULL, valeur_temp NUMERIC(10, 3) NOT NULL, INDEX IDX_6B9E53F6B8830128 (thermostat_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE scenario_volet (id INT AUTO_INCREMENT NOT NULL, volet_id INT DEFAULT NULL, date_debut_activation DATETIME NOT NULL, date_fin_activation DATETIME NOT NULL, is_active TINYINT(1) NOT NULL, is_using_sensor TINYINT(1) NOT NULL, repetition TINYINT(1) NOT NULL, niveau_elevation NUMERIC(10, 3) NOT NULL, INDEX IDX_F2D5ACF5215A6787 (volet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE smart_home (id INT AUTO_INCREMENT NOT NULL, proprietaire_id INT NOT NULL, compteur_consommation_electrique_id INT DEFAULT NULL, compteur_consommation_thermique_id INT DEFAULT NULL, code_identification INT NOT NULL, adresse VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, INDEX IDX_4E0C953876C50E4A (proprietaire_id), UNIQUE INDEX UNIQ_4E0C953855F9B35A (compteur_consommation_electrique_id), UNIQUE INDEX UNIQ_4E0C9538FD409FC5 (compteur_consommation_thermique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE smart_home_habitant (smart_home_id INT NOT NULL, habitant_id INT NOT NULL, INDEX IDX_B51661DC49B94322 (smart_home_id), INDEX IDX_B51661DC8254716F (habitant_id), PRIMARY KEY(smart_home_id, habitant_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE store (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, puissance_absorbee NUMERIC(10, 3) NOT NULL, reference INT NOT NULL, type VARCHAR(255) NOT NULL, position VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_FF575877AEA34913 (reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE thermostat (id INT AUTO_INCREMENT NOT NULL, centrale_alarme_id INT DEFAULT NULL, compteur_consommation_thermique_id INT DEFAULT NULL, description VARCHAR(255) NOT NULL, puissance_absorbee NUMERIC(10, 3) NOT NULL, reference INT NOT NULL, type VARCHAR(255) NOT NULL, plage_reglage VARCHAR(255) NOT NULL, sonde VARCHAR(255) NOT NULL, temp_ambiante NUMERIC(10, 3) NOT NULL, unite_mesure VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_B69BDDD0AEA34913 (reference), INDEX IDX_B69BDDD0B773747C (centrale_alarme_id), INDEX IDX_B69BDDD0FD409FC5 (compteur_consommation_thermique_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE volet (id INT AUTO_INCREMENT NOT NULL, description VARCHAR(255) NOT NULL, puissance_absorbee NUMERIC(10, 3) NOT NULL, reference INT NOT NULL, type VARCHAR(255) NOT NULL, matiere VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_DDDA1DA4AEA34913 (reference), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wi_fi (id INT AUTO_INCREMENT NOT NULL, smart_home_id INT NOT NULL, password VARCHAR(255) NOT NULL, INDEX IDX_ABD70F1B49B94322 (smart_home_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE actionneur ADD CONSTRAINT FK_28734CFEA0D3138 FOREIGN KEY (scenario_en_execution_id) REFERENCES scenario (id)');
        $this->addSql('ALTER TABLE capteur ADD CONSTRAINT FK_5B4A1695C40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id)');
        $this->addSql('ALTER TABLE machine ADD CONSTRAINT FK_1505DF844CDBBB4D FOREIGN KEY (actionneur_id) REFERENCES actionneur (id)');
        $this->addSql('ALTER TABLE machine ADD CONSTRAINT FK_1505DF84C40FCFA8 FOREIGN KEY (piece_id) REFERENCES piece (id)');
        $this->addSql('ALTER TABLE etat ADD CONSTRAINT FK_55CAF7624CDBBB4D FOREIGN KEY (actionneur_id) REFERENCES actionneur (id)');
        $this->addSql('ALTER TABLE lampe ADD CONSTRAINT FK_4B92496555F9B35A FOREIGN KEY (compteur_consommation_electrique_id) REFERENCES compteur_consommation_electrique (id)');
        $this->addSql('ALTER TABLE metrique ADD CONSTRAINT FK_986E57B31708A229 FOREIGN KEY (capteur_id) REFERENCES capteur (id)');
        $this->addSql('ALTER TABLE piece ADD CONSTRAINT FK_44CA0B2349B94322 FOREIGN KEY (smart_home_id) REFERENCES smart_home (id)');
        $this->addSql('ALTER TABLE scenario_eclairage ADD CONSTRAINT FK_B126E48E17E7CA94 FOREIGN KEY (lampe_id) REFERENCES lampe (id)');
        $this->addSql('ALTER TABLE scenario_store ADD CONSTRAINT FK_D058E926B092A811 FOREIGN KEY (store_id) REFERENCES store (id)');
        $this->addSql('ALTER TABLE scenario_temp ADD CONSTRAINT FK_6B9E53F6B8830128 FOREIGN KEY (thermostat_id) REFERENCES thermostat (id)');
        $this->addSql('ALTER TABLE scenario_volet ADD CONSTRAINT FK_F2D5ACF5215A6787 FOREIGN KEY (volet_id) REFERENCES volet (id)');
        $this->addSql('ALTER TABLE smart_home ADD CONSTRAINT FK_4E0C953876C50E4A FOREIGN KEY (proprietaire_id) REFERENCES proprietaire (id)');
        $this->addSql('ALTER TABLE smart_home ADD CONSTRAINT FK_4E0C953855F9B35A FOREIGN KEY (compteur_consommation_electrique_id) REFERENCES compteur_consommation_electrique (id)');
        $this->addSql('ALTER TABLE smart_home ADD CONSTRAINT FK_4E0C9538FD409FC5 FOREIGN KEY (compteur_consommation_thermique_id) REFERENCES compteur_consommation_thermique (id)');
        $this->addSql('ALTER TABLE smart_home_habitant ADD CONSTRAINT FK_B51661DC49B94322 FOREIGN KEY (smart_home_id) REFERENCES smart_home (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE smart_home_habitant ADD CONSTRAINT FK_B51661DC8254716F FOREIGN KEY (habitant_id) REFERENCES habitant (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE thermostat ADD CONSTRAINT FK_B69BDDD0B773747C FOREIGN KEY (centrale_alarme_id) REFERENCES centrale_alarme (id)');
        $this->addSql('ALTER TABLE thermostat ADD CONSTRAINT FK_B69BDDD0FD409FC5 FOREIGN KEY (compteur_consommation_thermique_id) REFERENCES compteur_consommation_thermique (id)');
        $this->addSql('ALTER TABLE wi_fi ADD CONSTRAINT FK_ABD70F1B49B94322 FOREIGN KEY (smart_home_id) REFERENCES smart_home (id)');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) DEFAULT NULL, CHANGE last_login last_login DATETIME DEFAULT NULL, CHANGE confirmation_token confirmation_token VARCHAR(180) DEFAULT NULL, CHANGE password_requested_at password_requested_at DATETIME DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE machine DROP FOREIGN KEY FK_1505DF844CDBBB4D');
        $this->addSql('ALTER TABLE etat DROP FOREIGN KEY FK_55CAF7624CDBBB4D');
        $this->addSql('ALTER TABLE metrique DROP FOREIGN KEY FK_986E57B31708A229');
        $this->addSql('ALTER TABLE thermostat DROP FOREIGN KEY FK_B69BDDD0B773747C');
        $this->addSql('ALTER TABLE lampe DROP FOREIGN KEY FK_4B92496555F9B35A');
        $this->addSql('ALTER TABLE smart_home DROP FOREIGN KEY FK_4E0C953855F9B35A');
        $this->addSql('ALTER TABLE smart_home DROP FOREIGN KEY FK_4E0C9538FD409FC5');
        $this->addSql('ALTER TABLE thermostat DROP FOREIGN KEY FK_B69BDDD0FD409FC5');
        $this->addSql('ALTER TABLE smart_home_habitant DROP FOREIGN KEY FK_B51661DC8254716F');
        $this->addSql('ALTER TABLE scenario_eclairage DROP FOREIGN KEY FK_B126E48E17E7CA94');
        $this->addSql('ALTER TABLE capteur DROP FOREIGN KEY FK_5B4A1695C40FCFA8');
        $this->addSql('ALTER TABLE machine DROP FOREIGN KEY FK_1505DF84C40FCFA8');
        $this->addSql('ALTER TABLE smart_home DROP FOREIGN KEY FK_4E0C953876C50E4A');
        $this->addSql('ALTER TABLE actionneur DROP FOREIGN KEY FK_28734CFEA0D3138');
        $this->addSql('ALTER TABLE piece DROP FOREIGN KEY FK_44CA0B2349B94322');
        $this->addSql('ALTER TABLE smart_home_habitant DROP FOREIGN KEY FK_B51661DC49B94322');
        $this->addSql('ALTER TABLE wi_fi DROP FOREIGN KEY FK_ABD70F1B49B94322');
        $this->addSql('ALTER TABLE scenario_store DROP FOREIGN KEY FK_D058E926B092A811');
        $this->addSql('ALTER TABLE scenario_temp DROP FOREIGN KEY FK_6B9E53F6B8830128');
        $this->addSql('ALTER TABLE scenario_volet DROP FOREIGN KEY FK_F2D5ACF5215A6787');
        $this->addSql('DROP TABLE actionneur');
        $this->addSql('DROP TABLE appareil');
        $this->addSql('DROP TABLE administrateur');
        $this->addSql('DROP TABLE utilisateur');
        $this->addSql('DROP TABLE capteur');
        $this->addSql('DROP TABLE centrale_alarme');
        $this->addSql('DROP TABLE machine');
        $this->addSql('DROP TABLE compteur');
        $this->addSql('DROP TABLE compteur_consommation_electrique');
        $this->addSql('DROP TABLE compteur_consommation_thermique');
        $this->addSql('DROP TABLE etat');
        $this->addSql('DROP TABLE habitant');
        $this->addSql('DROP TABLE lampe');
        $this->addSql('DROP TABLE metrique');
        $this->addSql('DROP TABLE piece');
        $this->addSql('DROP TABLE proprietaire');
        $this->addSql('DROP TABLE scenario');
        $this->addSql('DROP TABLE scenario_eclairage');
        $this->addSql('DROP TABLE scenario_store');
        $this->addSql('DROP TABLE scenario_temp');
        $this->addSql('DROP TABLE scenario_volet');
        $this->addSql('DROP TABLE smart_home');
        $this->addSql('DROP TABLE smart_home_habitant');
        $this->addSql('DROP TABLE store');
        $this->addSql('DROP TABLE thermostat');
        $this->addSql('DROP TABLE volet');
        $this->addSql('DROP TABLE wi_fi');
        $this->addSql('ALTER TABLE fos_user CHANGE salt salt VARCHAR(255) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE last_login last_login DATETIME DEFAULT \'NULL\', CHANGE confirmation_token confirmation_token VARCHAR(180) CHARACTER SET utf8mb4 DEFAULT \'NULL\' COLLATE `utf8mb4_unicode_ci`, CHANGE password_requested_at password_requested_at DATETIME DEFAULT \'NULL\'');
    }
}
