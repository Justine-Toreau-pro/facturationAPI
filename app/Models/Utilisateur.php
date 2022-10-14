<?php

namespace App\Models;


use App\Utils\Database;
use PDO;


class Utilisateur {

    private $id;
    private $identifiant;
    private $password;
    private $entreprise;
    private $created_at;
    private $updated_at;

    public static function findAll($table, $Model){
        
        $pdo = Database::getPDO1();
        $sql = "SELECT * FROM `{$table}`";
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS);

        return json_encode($results);
    }

    public static function find($table, $column, $idselect){
        // se connecter à la BDD
        $pdo = Database::getPDO1();

        // écrire notre requête
        $sql = "SELECT * FROM `{$table}` WHERE `{$column}` =" . $idselect;

        // exécuter notre requête
        $pdoStatement = $pdo->query($sql);

        // un seul résultat => fetchObject
        $results = $pdoStatement->fetchObject('App\Models\Utilisateur');



        // retourner le résultat
        return $results ;
    }

    public function insert(){

        
       // Récupération de l'objet PDO représentant la connexion à la DB
       $pdo = Database::getPDO1();

       // Ecriture de la requête INSERT INTO

       $sql = "
           INSERT INTO `Utilisateur` (id, identifiant, password, entreprise, created_at, updated_at)
           VALUES ('{$this->id}', '{$this->identifiant}', '{$this->password}','{$this->entreprise}', '{$this->created_at}', '{$this->updated_at}')
       ";

       //Préparation de la requête pour éviter les injection sql
       $query = $pdo->prepare($sql);
       
       $query->bindValue($this->id, PDO::PARAM_INT);
       $query->bindValue($this->identifiant, PDO::PARAM_STR);
       $query->bindValue($this->password, PDO::PARAM_STR);
       $query->bindValue($this->entreprise, PDO::PARAM_STR);
       $query->bindValue($this->created_at, PDO::PARAM_STR);
       $query->bindValue($this->updated_at, PDO::PARAM_STR);
       
       // 3. Execution de la requête d'insertion (avec $query->execute())
       $query->execute();

       //$query->rowCount() contient le nombre de lignes affectées
       // Si au moins une ligne ajoutée
      if ($query->rowCount() > 0) {
           // Alors on récupère l'id auto-incrémenté généré par MySQL
        $this->id = $pdo->lastInsertId();

           // On retourne VRAI car l'ajout a parfaitement fonctionné
         return true;
           // => l'interpréteur PHP sort de cette fonction car on a retourné une donnée
      }

       // Si on arrive ici, c'est que quelque chose n'a pas bien fonctionné => FAUX
      return false;
   
    }


    public function generateToken()
    {
        // On crée une chaine introuvable
        //$token = md5(time() . uniqid(true) . mt_rand(1, 1000));
        // Plus secure ? => bin2hex(random_bytes(32));
        $token = bin2hex(random_bytes(32));
        // On le stocke en session
        $_SESSION['token'] = $token;

        return $token;
    }

    

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
   

    /**
     * Get the value of identifiant
     */ 
    public function getIdentifiant()
    {
        return $this->identifiant;
    }

    /**
     * Set the value of identifiant
     *
     * @return  self
     */ 
    public function setIdentifiant($identifiant)
    {
        $this->identifiant = $identifiant;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

     /**
     * Get the value of entreprise
     */ 
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set the value of entreprise
     *
     * @return  self
     */ 
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get the value of created_at
     */ 
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;

        return $this;
    }


    /**
     * Get the value of updated_at
     */ 
    public function getUpdateddAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     *
     * @return  self
     */ 
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;

        return $this;
    }

}