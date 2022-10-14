SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

-- -----------------------------------------------------
-- Table `microgestion`.`Fournisseur`
-- -----------------------------------------------------

CREATE TABLE `microgestion`.`Fournisseur` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `numero_fournisseur` varchar(8) NOT NULL,
  `type_de_fournisseur` ENUM('entreprise', 'association', 'établissement publique') NOT NULL,
  `numero_cpt_client` varchar(16) DEFAULT NULL,
  `type_de_societe` varchar(32) DEFAULT NULL,
  `raison_sociale` varchar(64) NOT NULL,
  `adresse_numero` int(16) unsigned DEFAULT NULL,
  `adresse_bis_ter` varchar(8) DEFAULT NULL,
  `adresse_type_de_voie` varchar(64) DEFAULT NULL,
  `adresse_nom_de_la_voie` varchar(128) DEFAULT NULL,
  `adresse_cp` int(8) unsigned DEFAULT NULL,
  `adresse_ville` varchar(64) DEFAULT NULL,
  `adresse_pays` varchar(64) DEFAULT NULL,
  `telephone` int(10) unsigned DEFAULT NULL,
  `mail` varchar(128) DEFAULT NULL,
  `site_web` varchar(128) DEFAULT NULL,
  `numero_siret` int(10) unsigned DEFAULT NULL,
  `numero_siren` int(10) unsigned DEFAULT NULL,
  `numero_tva` varchar(32) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `numero_fournisseur` (`numero_fournisseur` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `Fournisseur` (`id`, `numero_fournisseur`, `type_de_fournisseur`, `numero_cpt_client`, `type_de_societe`, `raison_sociale`, `adresse_numero`, `adresse_bis_ter`, `adresse_type_de_voie`, `adresse_nom_de_la_voie`, `adresse_cp`, `adresse_ville`, `adresse_pays`, `telephone`, `mail`, `site_web`, `numero_siret`, `numero_siren`, `numero_tva`, `created_at`, `updated_at`) VALUES
(1,	'001',	'entreprise',	'2563',	'SARL',	'Samsung',	12,	'bis',	'rue',	'du Pont',	29200,	'BREST',	'FRANCE',	295463356,	'samsung@gmail.com',	'www.samsung.fr',	123456,	123456789,	'TV1235489',	'2022-08-02 13:03:55',	'2022-08-02 13:03:55');
-- -----------------------------------------------------
-- Table `microgestion`.`Client`
-- -----------------------------------------------------

CREATE TABLE `microgestion`.`Client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_client` varchar(8) NOT NULL,
  `type_de_client` ENUM('entreprise','particulier', 'association', 'établissement publique') NOT NULL,
  `numero_cpt_fournisseur` varchar(16) DEFAULT NULL,
  `type_de_societe` varchar(32) DEFAULT NULL,
  `raison_sociale` varchar(64) NOT NULL,
  `adresse_numero` int(16) unsigned DEFAULT NULL,
  `adresse_bis_ter` varchar(8) DEFAULT NULL,
  `adresse_type_de_voie` varchar(64) DEFAULT NULL,
  `adresse_nom_de_la_voie` varchar(128) DEFAULT NULL,
  `adresse_cp` int(8) unsigned DEFAULT NULL,
  `adresse_ville` varchar(64) DEFAULT NULL,
  `adresse_pays` varchar(64) DEFAULT NULL,
  `telephone` int(10) unsigned DEFAULT NULL,
  `mail` varchar(128) DEFAULT NULL,
  `site_web` varchar(128) DEFAULT NULL,
  `numero_siret` int(10) unsigned DEFAULT NULL,
  `numero_siren` int(10) unsigned DEFAULT NULL,
  `numero_tva` varchar(32) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `numero_client` (`numero_client` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


-- -----------------------------------------------------
-- Table `microgestion`.`Prospect`
-- -----------------------------------------------------

CREATE TABLE `microgestion`.`Prospect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_prospect` varchar(8) NOT NULL,
  `type_de_prospect` ENUM('entreprise','particulier', 'association', 'établissement publique','autre') NOT NULL,
  `type_de_societe` varchar(32) DEFAULT NULL,
  `raison_sociale` varchar(64) NOT NULL,
  `adresse_numero` int(16) unsigned DEFAULT NULL,
  `adresse_bis_ter` varchar(8) DEFAULT NULL,
  `adresse_type_de_voie` varchar(64) DEFAULT NULL,
  `adresse_nom_de_la_voie` varchar(128) DEFAULT NULL,
  `adresse_cp` int(8) unsigned DEFAULT NULL,
  `adresse_ville` varchar(64) DEFAULT NULL,
  `adresse_pays` varchar(64) DEFAULT NULL,
  `telephone` int(10) unsigned DEFAULT NULL,
  `mail` varchar(128) DEFAULT NULL,
  `site_web` varchar(128) DEFAULT NULL,
  `numero_siret` int(10) unsigned DEFAULT NULL,
  `numero_siren` int(10) unsigned DEFAULT NULL,
  `numero_tva` varchar(32) DEFAULT NULL,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `numero_prospect` (`numero_prospect` ASC)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;