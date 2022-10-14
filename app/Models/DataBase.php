<?php

namespace App\Models;

use App\Models\CoreModel;
use PDO;
use PDOException;

class DataBase extends CoreModel{
    
    public static function newDatabase($username, $password, $database)
    {
        $servername = 'localhost';
        
                try{
                    $dbco = new PDO("mysql:host=$servername", "root", "Bigbang.29");
                    $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sql = "CREATE DATABASE `{$database}`";

                    $sql2 = "CREATE USER `{$username}`@'localhost' IDENTIFIED BY '{$password}' GRANT 	[Create routine] ON `{$database}` TO `{$username}`@'localhost'";
                   
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
                    $dbco->exec($sql3);
                    echo 'Base de données créée bien créée !';
                }
                
                catch(PDOException $e){
                  echo "Erreur : " . $e->getMessage();
                }
    }
    
}