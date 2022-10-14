<?php


namespace App\Utils;

use PDO;

// Retenir son utilisation  => Database::getPDO()
// Design Pattern : Singleton
class Database
{
    /**
     * Objet PDO représentant la connexion à la base de données
     *
     * @var PDO
     */
    private $dbh1;
    private $dbh2;
    
    /**
     * Propriété statique (liée à la classe) stockant l'unique instance objet
     *
     * @var Database
     */
    private static $instance;

    /**
     * Constructeur
     *
     * en visibilité private
     * => seul le code de la classe a le droit de créer une instance de cette classe
     */
    private function __construct()
    {   
        //RECUPERER LES INFORMATIONS STOCKEES EN $_SESSION
        $dbHost = 'localhost';
        $dbName = $_SESSION['entreprise'];//'microgestion';
        //var_dump($dbName);
        $dbUserName = 'root';
        $dbPassword = 'Bigbang.29';
        // Récupération des données du fichier de config
        // la fonction parse_ini_file parse le fichier et retourne un array associatif
        $configData = parse_ini_file(__DIR__ . '/../config.ini');

        // PHP essaie d'exécuter tout le code à l'intérieur du bloc "try", mais...
        try {
            $this->dbh1 = new PDO(
                "mysql:host={$configData['DB_HOST_1']};dbname={$configData['DB_NAME_1']};charset=utf8",
                $configData['DB_USERNAME_1'],
                $configData['DB_PASSWORD_1'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            ) ;
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
        
        try{    
            $this->dbh2 = new PDO(
                "mysql:host={$dbHost};dbname={$dbName};charset=utf8",
                $dbUserName,
                $dbPassword,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        // ... mais si une erreur (Exception) survient, alors on attrape l'exception
        // et on exécute le code que l'on souhaite (ici, on affiche un message d'erreur)
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    /**
     * Méthode permettant de retourner, dans tous les cas,
     * la propriété dbh (objet PDO) de l'unique instance de Database
     *
     * @return PDO
     */
    public static function getPDO1()
    {
        // Si on n'a pas encore créé la seule instance de la classe
        if (empty(self::$instance)) {
            // Alors, on crée cette instance et on la stocke dans la propriété statique $instance
            self::$instance = new Database();
        }
        // Sinon, on ne fait rien l'instance a déjà été créée

        // Enfin, on retourne la propriété dbh de l'instance unique de Database
        return self::$instance->dbh1;
    }

    public static function getPDO2()
    {
        // Si on n'a pas encore créé la seule instance de la classe
        if (empty(self::$instance)) {
            // Alors, on crée cette instance et on la stocke dans la propriété statique $instance
            self::$instance = new Database();
        }
        // Sinon, on ne fait rien l'instance a déjà été créée

        // Enfin, on retourne la propriété dbh de l'instance unique de Database
        return self::$instance->dbh2;
    }
}
