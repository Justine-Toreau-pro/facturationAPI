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
              
                    $sql3 = "CREATE TABLE IF NOT EXISTS `{$database}`.`fournisseur` (
                      `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
                      `firstname` VARCHAR(64) NULL,
                      `lastname` VARCHAR(64) NULL,
                      `job` VARCHAR(64) NULL,
                      `status` TINYINT NOT NULL DEFAULT 0,
                      `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
                      `updated_at` TIMESTAMP NULL,
                      PRIMARY KEY (`id`))
                    ENGINE = InnoDB";
                    
                      
                      
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