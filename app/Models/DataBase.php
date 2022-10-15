<?php

namespace App\Models;

use App\Models\CoreModel;
use PDO;
use PDOException;

class DataBase extends CoreModel{
    
    public static function newDatabase($username, $password, $database)
    {
        
        $configData = parse_ini_file(__DIR__ . '/../config.ini');
        
                try{
                    $dbco = new PDO(
                      "mysql:host={$configData['DB_HOST_1']}",
                      $configData['DB_USERNAME_1'],
                      $configData['DB_PASSWORD_1'],
                      array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
                    ) ;
                    
                    $sql = "CREATE DATABASE `{$database}`";

                    $sql2 = "CREATE USER `{$username}`@'localhost' IDENTIFIED BY '{$password}'"; 

                    $sql21 = "GRANT ALL PRIVILEGES ON `{$database}` . * TO `{$username}`@'localhost'";

                    $sql22 = "FLUSH PRIVILEGES";
              
                    $sql3 = "CREATE TABLE `{$database}`.`Article` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `code_article` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `designation_article` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `fournisseur_id` int DEFAULT NULL,
                      `prix_achat_unitaire_ht` int DEFAULT NULL,
                      `tva_achat` int DEFAULT NULL,
                      `prix_vente_unitaire_ht` int DEFAULT NULL,
                      `tva_vente` int DEFAULT NULL,
                      `stock` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `code_article` (`code_article`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`Client` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_client` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `type_de_client` enum('entreprise','particulier','association','établissement publique') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `numero_cpt_fournisseur` varchar(16) DEFAULT NULL,
                      `type_de_societe` varchar(32) DEFAULT NULL,
                      `raison_sociale` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `adresse_numero` int unsigned DEFAULT NULL,
                      `adresse_bis_ter` varchar(8) DEFAULT NULL,
                      `adresse_type_de_voie` varchar(64) DEFAULT NULL,
                      `adresse_nom_de_la_voie` varchar(128) DEFAULT NULL,
                      `adresse_cp` int unsigned DEFAULT NULL,
                      `adresse_ville` varchar(64) DEFAULT NULL,
                      `adresse_pays` varchar(64) DEFAULT NULL,
                      `telephone` int unsigned DEFAULT NULL,
                      `mail` varchar(128) DEFAULT NULL,
                      `site_web` varchar(128) DEFAULT NULL,
                      `numero_siret` int unsigned DEFAULT NULL,
                      `numero_siren` int unsigned DEFAULT NULL,
                      `numero_tva` varchar(32) DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_client` (`numero_client`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
                    
                    
                    CREATE TABLE `{$database}`.`ClientBdc` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_bdc` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_client` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_bdc` (`numero_bdc`),
                      KEY `id_client` (`id_client`),
                      CONSTRAINT `ClientBdc_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientBdcLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_bdc` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_bdc` (`id_bdc`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `ClientBdcLigne_ibfk_1` FOREIGN KEY (`id_bdc`) REFERENCES `ClientBdc` (`id`),
                      CONSTRAINT `ClientBdcLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientBdl` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_bdl` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_client` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_bdl` (`numero_bdl`),
                      KEY `id_client` (`id_client`),
                      CONSTRAINT `ClientBdl_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientBdlLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_bdl` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_bdl` (`id_bdl`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `ClientBdlLigne_ibfk_1` FOREIGN KEY (`id_bdl`) REFERENCES `ClientBdl` (`id`),
                      CONSTRAINT `ClientBdlLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientDevis` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_devis` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_client` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_devis` (`numero_devis`),
                      KEY `id_client` (`id_client`),
                      CONSTRAINT `ClientDevis_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientDevisLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_devis` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_devis` (`id_devis`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `ClientDevisLigne_ibfk_1` FOREIGN KEY (`id_devis`) REFERENCES `ClientDevis` (`id`),
                      CONSTRAINT `ClientDevisLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientFacture` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_facture` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_client` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_facture` (`numero_facture`),
                      KEY `id_client` (`id_client`),
                      CONSTRAINT `ClientFacture_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `Client` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`ClientFactureLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_facture` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_facture` (`id_facture`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `ClientFactureLigne_ibfk_1` FOREIGN KEY (`id_facture`) REFERENCES `ClientFacture` (`id`),
                      CONSTRAINT `ClientFactureLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`Fournisseur` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_fournisseur` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `type_de_fournisseur` enum('entreprise','association','établissement publique') NOT NULL,
                      `numero_cpt_client` varchar(16) DEFAULT NULL,
                      `type_de_societe` varchar(32) DEFAULT NULL,
                      `raison_sociale` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `adresse_numero` int unsigned DEFAULT NULL,
                      `adresse_bis_ter` varchar(8) DEFAULT NULL,
                      `adresse_type_de_voie` varchar(64) DEFAULT NULL,
                      `adresse_nom_de_la_voie` varchar(128) DEFAULT NULL,
                      `adresse_cp` int unsigned DEFAULT NULL,
                      `adresse_ville` varchar(64) DEFAULT NULL,
                      `adresse_pays` varchar(64) DEFAULT NULL,
                      `telephone` int unsigned DEFAULT NULL,
                      `mail` varchar(128) DEFAULT NULL,
                      `site_web` varchar(128) DEFAULT NULL,
                      `numero_siret` int unsigned DEFAULT NULL,
                      `numero_siren` int unsigned DEFAULT NULL,
                      `numero_tva` varchar(32) DEFAULT NULL,
                      `created_at` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_fournisseur` (`numero_fournisseur`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8mb3;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurBdc` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_bdc` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_fournisseur` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_bdc` (`numero_bdc`),
                      KEY `id_fournisseur` (`id_fournisseur`),
                      CONSTRAINT `FournisseurBdc_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `Fournisseur` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurBdcLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_bdc` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_bdc` (`id_bdc`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `FournisseurBdcLigne_ibfk_1` FOREIGN KEY (`id_bdc`) REFERENCES `FournisseurBdc` (`id`),
                      CONSTRAINT `FournisseurBdcLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurBdl` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_bdl` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_fournisseur` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_bdl` (`numero_bdl`),
                      KEY `id_fournisseur` (`id_fournisseur`),
                      CONSTRAINT `FournisseurBdl_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `Fournisseur` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurBdlLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_bdl` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_bdc` (`id_bdl`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `FournisseurBdlLigne_ibfk_1` FOREIGN KEY (`id_bdl`) REFERENCES `FournisseurBdc` (`id`),
                      CONSTRAINT `FournisseurBdlLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurDevis` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_devis` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_fournisseur` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_devis` (`numero_devis`),
                      KEY `id_fournisseur` (`id_fournisseur`),
                      CONSTRAINT `FournisseurDevis_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `Fournisseur` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurDevisLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_devis` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `uptated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_devis` (`id_devis`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `FournisseurDevisLigne_ibfk_1` FOREIGN KEY (`id_devis`) REFERENCES `FournisseurDevis` (`id`),
                      CONSTRAINT `FournisseurDevisLigne_ibfk_2` FOREIGN KEY (`id_devis`) REFERENCES `FournisseurDevis` (`id`),
                      CONSTRAINT `FournisseurDevisLigne_ibfk_3` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurFacture` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_facture` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
                      `id_fournisseur` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_facture` (`numero_facture`),
                      KEY `id_fournisseur` (`id_fournisseur`),
                      CONSTRAINT `FournisseurFacture_ibfk_1` FOREIGN KEY (`id_fournisseur`) REFERENCES `Fournisseur` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`FournisseurFactureLigne` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `id_facture` int DEFAULT NULL,
                      `id_article` int DEFAULT NULL,
                      `quantity` int DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      KEY `id_facture` (`id_facture`),
                      KEY `id_article` (`id_article`),
                      CONSTRAINT `FournisseurFactureLigne_ibfk_1` FOREIGN KEY (`id_facture`) REFERENCES `FournisseurFacture` (`id`),
                      CONSTRAINT `FournisseurFactureLigne_ibfk_2` FOREIGN KEY (`id_article`) REFERENCES `Article` (`id`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
                    
                    
                    CREATE TABLE `{$database}`.`Prospect` (
                      `id` int NOT NULL AUTO_INCREMENT,
                      `numero_prospect` varchar(8) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `type_de_prospect` enum('entreprise','particulier','association','établissement publique','autre') CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `type_de_societe` varchar(32) DEFAULT NULL,
                      `raison_sociale` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
                      `adresse_numero` int unsigned DEFAULT NULL,
                      `adresse_bis_ter` varchar(8) DEFAULT NULL,
                      `adresse_type_de_voie` varchar(64) DEFAULT NULL,
                      `adresse_nom_de_la_voie` varchar(128) DEFAULT NULL,
                      `adresse_cp` int unsigned DEFAULT NULL,
                      `adresse_ville` varchar(64) DEFAULT NULL,
                      `adresse_pays` varchar(64) DEFAULT NULL,
                      `telephone` int unsigned DEFAULT NULL,
                      `mail` varchar(128) DEFAULT NULL,
                      `site_web` varchar(128) DEFAULT NULL,
                      `numero_siret` int unsigned DEFAULT NULL,
                      `numero_siren` int unsigned DEFAULT NULL,
                      `numero_tva` varchar(32) DEFAULT NULL,
                      `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                      `updated_at` timestamp NULL DEFAULT NULL,
                      PRIMARY KEY (`id`),
                      UNIQUE KEY `numero_prospect` (`numero_prospect`)
                    ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;";
                    
                      
                      
                    $dbco->exec($sql);
                    $dbco->exec($sql2);
                    $dbco->exec($sql21);
                    $dbco->exec($sql22);
                    $dbco->exec($sql3);
                    echo 'Base de données créée bien créée !';
                }
                
                catch(PDOException $e){
                  echo "Erreur : " . $e->getMessage();
                }
    }
    
}