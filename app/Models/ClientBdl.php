<?php

namespace App\Models;

use App\Models\CoreModel;


class ClientBdl extends CoreModel{

   protected $id;
   private $numero_bdl;
   private $id_client; //Relation avec la table client : jointure à faire
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
    * Get the value of numero_bdl
    */
   public function getNumeroBdl()
   {
      return $this->numero_bdl;
   }

   /**
    * Set the value of numero_bdl
    */
   public function setNumeroBdl($numero_bdl): self
   {
      $this->numero_bdl = $numero_bdl;

      return $this;
   }

   /**
    * Get the value of id_client
    */
   public function getIdClient()
   {
      return $this->id_client;
   }

   /**
    * Set the value of id_client
    */
   public function setIdClient($id_client): self
   {
      $this->id_client = $id_client;

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