<?php

namespace App\Models;


use App\Utils\Database;
use PDO;


class Utilisateur 
{

    private $id;
    private $identifiant;
    private $password;
    private $entreprise;
    private $type_de_societe;
    private $raison_sociale;
    private $adresse_numero;
    private $adresse_bis_ter;
    private $adresse_type_de_voie;
    private $adresse_nom_de_la_voie;
    private $adresse_cp;
    private $adresse_ville;
    private $adresse_pays;
    private $telephone;
    private $mail;
    private $site_web;
    private $numero_siret;
    private $numero_siren;
    private $numero_tva;
    private $role;
    private $date_de_validite_paiement;
    private $created_at;
    private $updated_at;


    public static function findAll($table, $Model)
    {
        
        $pdo = Database::getPDO1();
        $sql = "SELECT * FROM `{$table}`";
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS);

        return json_encode($results);
    }


    public static function find($table, $column, $idselect)
    {
        $pdo = Database::getPDO1();
        $sql = "SELECT * FROM `{$table}` WHERE `{$column}` =" . $idselect;
        $pdoStatement = $pdo->query($sql);
        $results = $pdoStatement->fetchObject('App\Models\Utilisateur');

        return $results ;
    }



    public function insert()
    {
       $pdo = Database::getPDO1();

       $sql = "
           INSERT INTO 
           `Utilisateur` (id, identifiant, password, entreprise,type_de_societe, raison_sociale, adresse_numero, adresse_bis_ter, adresse_type_de_voie, adresse_nom_de_la_voie, adresse_cp, adresse_ville, adresse_pays, telephone, mail, site_web, numero_siret, numero_siren, numero_tva, role, date_de_validite_paiement, created_at, updated_at)

           VALUES 
           ('{$this->id}', '{$this->identifiant}', '{$this->password}','{$this->entreprise}', '{$this->type_de_societe}', '{$this->raison_sociale}', '{$this->adresse_numero}', '{$this->adresse_bis_ter}', '{$this->adresse_type_de_voie}','{$this->adresse_nom_de_la_voie}', '{$this->adresse_cp}', '{$this->adresse_ville}', '{$this->adresse_pays}', '{$this->telephone}', '{$this->mail}', '{$this->site_web}','{$this->numero_siret}', '{$this->numero_siren}', '{$this->numero_tva}', '{$this->role}', '{$this->date_de_validite_paiement}', '{$this->created_at}', '{$this->updated_at}')";

       $query = $pdo->prepare($sql);
       
       $query->bindValue($this->id, PDO::PARAM_INT);
       $query->bindValue($this->identifiant, PDO::PARAM_STR);
       $query->bindValue($this->password, PDO::PARAM_STR);
       $query->bindValue($this->entreprise, PDO::PARAM_STR);
       $query->bindValue($this->type_de_societe, PDO::PARAM_INT);
       $query->bindValue($this->raison_sociale, PDO::PARAM_STR);
       $query->bindValue($this->adresse_numero, PDO::PARAM_INT);
       $query->bindValue($this->adresse_bis_ter, PDO::PARAM_STR);
       $query->bindValue($this->adresse_type_de_voie, PDO::PARAM_STR);
       $query->bindValue($this->adresse_nom_de_la_voie, PDO::PARAM_STR);
       $query->bindValue($this->adresse_cp, PDO::PARAM_INT);
       $query->bindValue($this->adresse_ville, PDO::PARAM_STR);
       $query->bindValue($this->adresse_pays, PDO::PARAM_STR);
       $query->bindValue($this->telephone, PDO::PARAM_INT);
       $query->bindValue($this->mail, PDO::PARAM_STR);
       $query->bindValue($this->site_web, PDO::PARAM_STR);
       $query->bindValue($this->numero_siret, PDO::PARAM_INT);
       $query->bindValue($this->numero_siren, PDO::PARAM_INT);
       $query->bindValue($this->numero_tva, PDO::PARAM_STR);
       $query->bindValue($this->role, PDO::PARAM_STR);
       $query->bindValue($this->date_de_validite_paiement, PDO::PARAM_STR);
       $query->bindValue($this->created_at, PDO::PARAM_STR);
       $query->bindValue($this->updated_at, PDO::PARAM_STR);
       
       $query->execute();

       //$query->rowCount() contient le nombre de lignes affectées
       // Si au moins une ligne ajoutée
      if ($query->rowCount() > 0) 
      {
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


    public static function cryptage($password)
    {
        $ivlen = openssl_cipher_iv_length($cipher="AES-128-CBC");
        $iv = openssl_random_pseudo_bytes($ivlen);
        $ciphertext_raw = openssl_encrypt($password, $cipher, $key, $options=OPENSSL_RAW_DATA, $iv);
        $hmac = hash_hmac('sha256', $ciphertext_raw, $key, $as_binary=true);
        $ciphertext = base64_encode( $iv.$hmac.$ciphertext_raw );

        return $ciphertext;
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
     * Get the value of type_de_societe
     */
    public function getTypeDeSociete()
    {
        return $this->type_de_societe;
    }

    /**
     * Set the value of type_de_societe
     */
    public function setTypeDeSociete($type_de_societe): self
    {
        $this->type_de_societe = $type_de_societe;

        return $this;
    }

    /**
     * Get the value of raison_sociale
     */
    public function getRaisonSociale()
    {
        return $this->raison_sociale;
    }

    /**
     * Set the value of raison_sociale
     */
    public function setRaisonSociale($raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

        return $this;
    }

    /**
     * Get the value of adresse_numero
     */
    public function getAdresseNumero()
    {
        return $this->adresse_numero;
    }

    /**
     * Set the value of adresse_numero
     */
    public function setAdresseNumero($adresse_numero): self
    {
        $this->adresse_numero = $adresse_numero;

        return $this;
    }

    /**
     * Get the value of adresse_bis_ter
     */
    public function getAdresseBisTer()
    {
        return $this->adresse_bis_ter;
    }

    /**
     * Set the value of adresse_bis_ter
     */
    public function setAdresseBisTer($adresse_bis_ter): self
    {
        $this->adresse_bis_ter = $adresse_bis_ter;

        return $this;
    }

    /**
     * Get the value of adresse_type_de_voie
     */
    public function getAdresseTypeDeVoie()
    {
        return $this->adresse_type_de_voie;
    }

    /**
     * Set the value of adresse_type_de_voie
     */
    public function setAdresseTypeDeVoie($adresse_type_de_voie): self
    {
        $this->adresse_type_de_voie = $adresse_type_de_voie;

        return $this;
    }

    /**
     * Get the value of adresse_nom_de_la_voie
     */
    public function getAdresseNomDeLaVoie()
    {
        return $this->adresse_nom_de_la_voie;
    }

    /**
     * Set the value of adresse_nom_de_la_voie
     */
    public function setAdresseNomDeLaVoie($adresse_nom_de_la_voie): self
    {
        $this->adresse_nom_de_la_voie = $adresse_nom_de_la_voie;

        return $this;
    }

    /**
     * Get the value of adresse_cp
     */
    public function getAdresseCp()
    {
        return $this->adresse_cp;
    }

    /**
     * Set the value of adresse_cp
     */
    public function setAdresseCp($adresse_cp): self
    {
        $this->adresse_cp = $adresse_cp;

        return $this;
    }

    /**
     * Get the value of adresse_ville
     */
    public function getAdresseVille()
    {
        return $this->adresse_ville;
    }

    /**
     * Set the value of adresse_ville
     */
    public function setAdresseVille($adresse_ville): self
    {
        $this->adresse_ville = $adresse_ville;

        return $this;
    }

    /**
     * Get the value of adresse_pays
     */
    public function getAdressePays()
    {
        return $this->adresse_pays;
    }

    /**
     * Set the value of adresse_pays
     */
    public function setAdressePays($adresse_pays): self
    {
        $this->adresse_pays = $adresse_pays;

        return $this;
    }

    /**
     * Get the value of telephone
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set the value of telephone
     */
    public function setTelephone($telephone): self
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get the value of mail
     */
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set the value of mail
     */
    public function setMail($mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    /**
     * Get the value of site_web
     */
    public function getSiteWeb()
    {
        return $this->site_web;
    }

    /**
     * Set the value of site_web
     */
    public function setSiteWeb($site_web): self
    {
        $this->site_web = $site_web;

        return $this;
    }

    /**
     * Get the value of numero_siret
     */
    public function getNumeroSiret()
    {
        return $this->numero_siret;
    }

    /**
     * Set the value of numero_siret
     */
    public function setNumeroSiret($numero_siret): self
    {
        $this->numero_siret = $numero_siret;

        return $this;
    }

    /**
     * Get the value of numero_siren
     */
    public function getNumeroSiren()
    {
        return $this->numero_siren;
    }

    /**
     * Set the value of numero_siren
     */
    public function setNumeroSiren($numero_siren): self
    {
        $this->numero_siren = $numero_siren;

        return $this;
    }

    /**
     * Get the value of numero_tva
     */
    public function getNumeroTva()
    {
        return $this->numero_tva;
    }

    /**
     * Set the value of numero_tva
     */
    public function setNumeroTva($numero_tva): self
    {
        $this->numero_tva = $numero_tva;

        return $this;
    }

    /**
     * Get the value of role
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     */
    public function setRole($role): self
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of date_de_validite_paiement
     */
    public function getDateDeValiditePaiement()
    {
        return $this->date_de_validite_paiement;
    }

    /**
     * Set the value of date_de_validite_paiement
     */
    public function setDateDeValiditePaiement($date_de_validite_paiement): self
    {
        $this->date_de_validite_paiement = $date_de_validite_paiement;

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
     */
    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */
    public function setUpdatedAt($updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }
}