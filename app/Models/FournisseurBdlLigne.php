<?php

namespace App\Models;

use App\Models\CoreModel;


class FournisseurBdlLigne extends CoreModel{

   protected $id;
   private $id_bdl; //Relation avec la table bdl : jointure à faire
   private $id_article; //Relation avec la table article : jointure à faire
   private $quantity;
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
    * Get the value of id_bdl
    */
   public function getIdBdl()
   {
      return $this->id_bdl;
   }

   /**
    * Set the value of id_bdl
    */
   public function setIdBdl($id_bdl): self
   {
      $this->id_bdl = $id_bdl;

      return $this;
   }

   /**
    * Get the value of id_article
    */
   public function getIdArticle()
   {
      return $this->id_article;
   }

   /**
    * Set the value of id_article
    */
   public function setIdArticle($id_article): self
   {
      $this->id_article = $id_article;

      return $this;
   }

   /**
    * Get the value of quantity
    */
   public function getQuantity()
   {
      return $this->quantity;
   }

   /**
    * Set the value of quantity
    */
   public function setQuantity($quantity): self
   {
      $this->quantity = $quantity;

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