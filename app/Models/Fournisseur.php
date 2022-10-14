<?php

namespace App\Models;

use App\Models\CoreModel;


class Fournisseur extends CoreModel{

   protected $id;
   private $numero_fournisseur;
   private $type_de_fournisseur;
   private $numero_cpt_client;
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
   private $created_at;
   private $updated_at;



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
    * Get the value of numero_fournisseur
    */ 
   public function getNumero_fournisseur()
   {
      return $this->numero_fournisseur;
   }

   /**
    * Set the value of numero_fournisseur
    *
    * @return  self
    */ 
   public function setNumero_fournisseur($numero_fournisseur)
   {
      $this->numero_fournisseur = $numero_fournisseur;

      return $this;
   }


   /**
    * Get the value of type_de_fournisseur
    */ 
    public function getType_de_fournisseur()
    {
       return $this->type_de_fournisseur;
    }
 
    /**
     * Set the value of type_de_fournisseur
     *
     * @return  self
     */ 
    public function setType_de_fournisseur($type_de_fournisseur)
    {
       $this->type_de_fournisseur = $type_de_fournisseur;
 
       return $this;
    }

   /**
    * Get the value of numero_cpt_client
    */ 
   public function getNumero_cpt_client()
   {
      return $this->numero_cpt_client;
   }

   /**
    * Set the value of numero_cpt_client
    *
    * @return  self
    */ 
   public function setNumero_cpt_client($numero_cpt_client)
   {
      $this->numero_cpt_client = $numero_cpt_client;

      return $this;
   }

   /**
    * Get the value of type_de_societe
    */ 
   public function getType_de_societe()
   {
      return $this->type_de_societe;
   }

   /**
    * Set the value of type_de_societe
    *
    * @return  self
    */ 
   public function setType_de_societe($type_de_societe)
   {
      $this->type_de_societe = $type_de_societe;

      return $this;
   }

   /**
    * Get the value of raison_sociale
    */ 
   public function getRaison_sociale()
   {
      return $this->raison_sociale;
   }

   /**
    * Set the value of raison_sociale
    *
    * @return  self
    */ 
   public function setRaison_sociale($raison_sociale)
   {
      $this->raison_sociale = $raison_sociale;

      return $this;
   }

   /**
    * Get the value of adresse_numero
    */ 
   public function getAdresse_numero()
   {
      return $this->adresse_numero;
   }

   /**
    * Set the value of adresse_numero
    *
    * @return  self
    */ 
   public function setAdresse_numero($adresse_numero)
   {
      $this->adresse_numero = $adresse_numero;

      return $this;
   }

   /**
    * Get the value of adresse_bis_ter
    */ 
   public function getAdresse_bis_ter()
   {
      return $this->adresse_bis_ter;
   }

   /**
    * Set the value of adresse_bis_ter
    *
    * @return  self
    */ 
   public function setAdresse_bis_ter($adresse_bis_ter)
   {
      $this->adresse_bis_ter = $adresse_bis_ter;

      return $this;
   }

   /**
    * Get the value of adresse_type_de_voie
    */ 
   public function getAdresse_type_de_voie()
   {
      return $this->adresse_type_de_voie;
   }

   /**
    * Set the value of adresse_type_de_voie
    *
    * @return  self
    */ 
   public function setAdresse_type_de_voie($adresse_type_de_voie)
   {
      $this->adresse_type_de_voie = $adresse_type_de_voie;

      return $this;
   }

   /**
    * Get the value of adresse_nom_de_la_voie
    */ 
   public function getAdresse_nom_de_la_voie()
   {
      return $this->adresse_nom_de_la_voie;
   }

   /**
    * Set the value of adresse_nom_de_la_voie
    *
    * @return  self
    */ 
   public function setAdresse_nom_de_la_voie($adresse_nom_de_la_voie)
   {
      $this->adresse_nom_de_la_voie = $adresse_nom_de_la_voie;

      return $this;
   }

   /**
    * Get the value of adresse_cp
    */ 
   public function getAdresse_cp()
   {
      return $this->adresse_cp;
   }

   /**
    * Set the value of adresse_cp
    *
    * @return  self
    */ 
   public function setAdresse_cp($adresse_cp)
   {
      $this->adresse_cp = $adresse_cp;

      return $this;
   }

   /**
    * Get the value of adresse_pays
    */ 
   public function getAdresse_pays()
   {
      return $this->adresse_pays;
   }

   /**
    * Set the value of adresse_pays
    *
    * @return  self
    */ 
   public function setAdresse_pays($adresse_pays)
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
    *
    * @return  self
    */ 
   public function setTelephone($telephone)
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
    *
    * @return  self
    */ 
   public function setMail($mail)
   {
      $this->mail = $mail;

      return $this;
   }

   /**
    * Get the value of site_web
    */ 
   public function getSite_web()
   {
      return $this->site_web;
   }

   /**
    * Set the value of site_web
    *
    * @return  self
    */ 
   public function setSite_web($site_web)
   {
      $this->site_web = $site_web;

      return $this;
   }

   /**
    * Get the value of numero_siret
    */ 
   public function getNumero_siret()
   {
      return $this->numero_siret;
   }

   /**
    * Set the value of numero_siret
    *
    * @return  self
    */ 
   public function setNumero_siret($numero_siret)
   {
      $this->numero_siret = $numero_siret;

      return $this;
   }

   /**
    * Get the value of numero_siren
    */ 
   public function getNumero_siren()
   {
      return $this->numero_siren;
   }

   /**
    * Set the value of numero_siren
    *
    * @return  self
    */ 
   public function setNumero_siren($numero_siren)
   {
      $this->numero_siren = $numero_siren;

      return $this;
   }

   /**
    * Get the value of numero_tva
    */ 
   public function getNumero_tva()
   {
      return $this->numero_tva;
   }

   /**
    * Set the value of numero_tva
    *
    * @return  self
    */ 
   public function setNumero_tva($numero_tva)
   {
      $this->numero_tva = $numero_tva;

      return $this;
   }

   /**
    * Get the value of adresse_ville
    */ 
   public function getAdresse_ville()
   {
      return $this->adresse_ville;
   }

   /**
    * Set the value of adresse_ville
    *
    * @return  self
    */ 
   public function setAdresse_ville($adresse_ville)
   {
      $this->adresse_ville = $adresse_ville;

      return $this;
   }

   /**
    * Get the value of created_at
    */ 
    public function getCreated_at()
    {
       return $this->created_at;
    }
 
    /**
     * Set the value of created_at
     *
     * @return  self
     */ 
    public function setCreated_at($created_at)
    {
       $this->created_at = $created_at;
 
       return $this;
    }


    /**
    * Get the value of updated_at
    */ 
   public function getUpdated_at()
   {
      return $this->updated_at;
   }

   /**
    * Set the value of updated_at
    *
    * @return  self
    */ 
   public function setUpdated_at($updated_at)
   {
      $this->updated_at = $updated_at;

      return $this;
   }
}