<?php

namespace App\Models;

use App\Models\CoreModel;


class FournisseurBdc extends CoreModel{

   protected $id;
   private $numero_bdc;
   private $id_fournisseur; //Relation avec la table fournisseur : jointure à faire
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
    * Get the value of numero_bdc
    */
   public function getNumeroBdc()
   {
      return $this->numero_bdc;
   }

   /**
    * Set the value of numero_bdc
    */
   public function setNumeroBdc($numero_bdc): self
   {
      $this->numero_bdc = $numero_bdc;

      return $this;
   }

   /**
    * Get the value of id_fournisseur
    */
   public function getIdFournisseur()
   {
      return $this->id_fournisseur;
   }

   /**
    * Set the value of id_fournisseur
    */
   public function setIdFournisseur($id_fournisseur): self
   {
      $this->id_fournisseur = $id_fournisseur;

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