<?php


namespace App\Utils;

use PDO;

use App\Controllers\SecurityController;

// Retenir son utilisation  => Database::getPDO()
// Design Pattern : Singleton
class Database2
{
    /**
     * Objet PDO représentant la connexion à la base de données
     *
     * @var PDO
     */
    
    private $dbh2;
     
    
    /**
     * Propriété statique (liée à la classe) stockant l'unique instance objet
     *
     * @var Database2
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
        //$dbName = $_SESSION['entreprise'];
        $dbUserName = $_SESSION['identifiant'];
        $dbPassword = SecurityController::decryptage($_SESSION['password']);
        //var_dump($dbUserName);
        //var_dump($_SESSION['password']);
        //var_dump($dbPassword);
        try{    
            $this->dbh2 = new PDO(
                "mysql:host={$dbHost};dbname={$_SESSION['identifiant']};charset=utf8",
                $dbUserName,
                $dbPassword,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );

            
        //var_dump($_SESSION);
        //var_dump($dbUserName);
        //var_dump($dbPassword);
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
    

    public static function getPDO2()
    {
        // Si on n'a pas encore créé la seule instance de la classe
        if (empty(self::$instance)) {
            // Alors, on crée cette instance et on la stocke dans la propriété statique $instance
            self::$instance = new Database2();
        }
        // Sinon, on ne fait rien l'instance a déjà été créée

        // Enfin, on retourne la propriété dbh de l'instance unique de Database
        return self::$instance->dbh2;
    }
}
