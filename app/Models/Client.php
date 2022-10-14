<?php

namespace App\Models;

use App\Models\CoreModel;


class Client extends CoreModel{

   protected $id;
   private $numero_client;
   private $type_de_client;
   private $numero_cpt_fournisseur;
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
    */
   public function setId($id): self
   {
      $this->id = $id;

      return $this;
   }

   /**
    * Get the value of numero_client
    */
   public function getNumeroClient()
   {
      return $this->numero_client;
   }

   /**
    * Set the value of numero_client
    */
   public function setNumeroClient($numero_client): self
   {
      $this->numero_client = $numero_client;

      return $this;
   }

   /**
    * Get the value of type_de_client
    */
   public function getTypeDeClient()
   {
      return $this->type_de_client;
   }

   /**
    * Set the value of type_de_client
    */
   public function setTypeDeClient($type_de_client): self
   {
      $this->type_de_client = $type_de_client;

      return $this;
   }

   /**
    * Get the value of numero_cpt_fournisseur
    */
   public function getNumeroCptFournisseur()
   {
      return $this->numero_cpt_fournisseur;
   }

   /**
    * Set the value of numero_cpt_fournisseur
    */
   public function setNumeroCptFournisseur($numero_cpt_fournisseur): self
   {
      $this->numero_cpt_fournisseur = $numero_cpt_fournisseur;

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