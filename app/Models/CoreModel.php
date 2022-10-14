<?php
/**
     * On déclare les méthodes abstraites à "implémenter" par les enfants
     */
//     abstract protected static function find($id);
//     abstract protected static function findAll();
//     abstract protected function insert();
//     abstract protected function update();
//     abstract protected function delete();


namespace App\Models;

use PDO;
use App\Utils\Database;
use App\Models\Fournisseur;

// Classe mère de tous les Models
// On centralise ici toutes les propriétés et méthodes utiles pour TOUS les Models

class CoreModel{

    public static function cors(){

        // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        exit(0);
    }
    
    
        
        //header('Access-Control-Allow-Origin : *');
        //header('content-type:application/json; charset=utf-8');
        //header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH');
        //header('Access-Control-Allow-Header : Content-type');
    }

    public static function findAll($table)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = "SELECT * FROM `{$table}`";
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }


    public static function findAllJoin2($table1, $table2, $column1, $column2)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = "SELECT * FROM `{$table1}`, `{$table2}`
        WHERE `{$table1}`.`{$column1}` = `{$table2}`.`{$column2}` "
        ;
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }
    

    public static function findAllJoin3($table1, $table2, $table3, $table4, $table5, $table6, $table7, $column1, $column2, $column3, $column4)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = "SELECT * FROM `{$table1}`, `{$table2}`, `{$table3}`
        WHERE `{$table4}`.`{$column1}` = `{$table5}`.`{$column2}`
        AND  `{$table6}`.`{$column3}` = `{$table7}`.`{$column4}` "
        ;
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }


    public static function findAllJoin4($table1, $table2, $table3, $table4, $table5, $table6, $table7, $table8, $table9, $table10, $column1, $column2, $column3, $column4, $column5, $column6)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = "SELECT * FROM `{$table1}`, `{$table2}`, `{$table3}`, `{$table4}`
        WHERE `{$table5}`.`{$column1}` = `{$table6}`.`{$column2}`
        AND  `{$table7}`.`{$column3}` = `{$table8}`.`{$column4}`
        AND  `{$table9}`.`{$column5}` = `{$table10}`.`{$column6}`  "
        ;
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }


    public static function find($table, $column, $idColumnSelect)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = "SELECT * FROM `{$table}` WHERE `{$column}` =" . $idColumnSelect;
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }


    public static function findJoin2($table1, $table2, $column, $idColumnSelect, $table3, $table4, $table5, $column1, $column2)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = 
        "SELECT * FROM `{$table1}`, `{$table2}` 
        WHERE  `{$table3}`.`{$column1}` = `{$table4}`.`{$column2}` 
        AND `{$table5}`.`{$column}` =" . $idColumnSelect;
        
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }


    public static function findJoin3($table1, $table2, $table3, $column, $idColumnSelect, $table4, $table5, $table6, $table7, $table8, $column1, $column2, $column3, $column4)
    {
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = 
        "SELECT * FROM `{$table1}`, `{$table2}` , `{$table3}`
        WHERE  `{$table4}`.`{$column1}` = `{$table5}`.`{$column2}` 
        AND  `{$table6}`.`{$column3}` = `{$table7}`.`{$column4}` 
        AND `{$table8}`.`{$column}` =" . $idColumnSelect;
        
        $pdoStatement = $pdo->query($sql);
        $response = $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        return json_encode($response);
    }


    public function insert($table, $column, $id, $tableau=[])
    {

        
         // Récupération de l'objet PDO représentant la connexion à la DB
       $pdo = Database::getPDO2();
       $sql0 =   "
       INSERT INTO `{$table}` (`{$column}`)
       VALUES ('{$id}')
   ";

        //Préparation de la requête pour éviter les injections sql
        $query = $pdo->prepare($sql0);
        
        $query->bindValue($id, (PDO::PARAM_INT));
        $query->execute();

        $pdo->exec($sql0);

       // Ecriture de la requête INSERT INTO
       foreach($tableau as $column1 => $this->value) :
      
       $sql =   "
          UPDATE `{$table}` 
          SET `{$column1}` = '{$this->value}'
          WHERE id =" . $id 
       ;

        
       $pdo->exec($sql);
       

       //Préparation de la requête pour éviter les injections sql
       //$query = $pdo->prepare($sql);
       //print_r($query);
       //$query->bindValue($value, (PDO::PARAM_STR || PDO::PARAM_INT));
       
       endforeach;

       
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


    public function update($table, $tableau, $id)
    {
        $pdo = Database::getPDO2();

        foreach($tableau as $column1 => $this->value) :
      
            $sql =   "
               UPDATE `{$table}` 
               SET `{$column1}` = '{$this->value}'
               WHERE id =" . $id 
            ;
     
             
            $pdo->exec($sql);
            print_r($sql);
     
            //Préparation de la requête pour éviter les injections sql
            //$query = $pdo->prepare($sql);
            //print_r($query);
            //$query->bindValue($value, (PDO::PARAM_STR || PDO::PARAM_INT));
            
            endforeach;
    }


    public static function delete($table, $column, $idColumnSelect)
    {
        
        CoreModel::cors();

        $pdo = Database::getPDO2();
        $sql = "DELETE FROM `{$table}` WHERE `{$column}` =" . $idColumnSelect;
        $pdo->exec($sql);
        return;

    }


}