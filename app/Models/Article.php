<?php

namespace App\Models;

use App\Models\CoreModel;


class Article extends CoreModel{


   protected $id;
   private $code_article;
   private $designation_article;
   private $fournisseur_id;
   private $prix_achat_unitaire_ht;
   private $tva_achat;
   private $prix_vente_unitaire_ht;
   private $tva_vente;
   private $stock;
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
    * Get the value of code_article
    */
   public function getCodeArticle()
   {
      return $this->code_article;
   }

   /**
    * Set the value of code_article
    */
   public function setCodeArticle($code_article): self
   {
      $this->code_article = $code_article;

      return $this;
   }

   /**
    * Get the value of designation_article
    */
   public function getDesignationArticle()
   {
      return $this->designation_article;
   }

   /**
    * Set the value of designation_article
    */
   public function setDesignationArticle($designation_article): self
   {
      $this->designation_article = $designation_article;

      return $this;
   }

   /**
    * Get the value of fournisseur_id
    */
   public function getFournisseurId()
   {
      return $this->fournisseur_id;
   }

   /**
    * Set the value of fournisseur_id
    */
   public function setFournisseurId($fournisseur_id): self
   {
      $this->fournisseur_id = $fournisseur_id;

      return $this;
   }

   /**
    * Get the value of prix_achat_unitaire_ht
    */
   public function getPrixAchatUnitaireHt()
   {
      return $this->prix_achat_unitaire_ht;
   }

   /**
    * Set the value of prix_achat_unitaire_ht
    */
   public function setPrixAchatUnitaireHt($prix_achat_unitaire_ht): self
   {
      $this->prix_achat_unitaire_ht = $prix_achat_unitaire_ht;

      return $this;
   }

   /**
    * Get the value of tva_achat
    */
   public function getTvaAchat()
   {
      return $this->tva_achat;
   }

   /**
    * Set the value of tva_achat
    */
   public function setTvaAchat($tva_achat): self
   {
      $this->tva_achat = $tva_achat;

      return $this;
   }

   /**
    * Get the value of prix_vente_unitaire_ht
    */
   public function getPrixVenteUnitaireHt()
   {
      return $this->prix_vente_unitaire_ht;
   }

   /**
    * Set the value of prix_vente_unitaire_ht
    */
   public function setPrixVenteUnitaireHt($prix_vente_unitaire_ht): self
   {
      $this->prix_vente_unitaire_ht = $prix_vente_unitaire_ht;

      return $this;
   }

   /**
    * Get the value of tva_vente
    */
    public function getTvaVente()
    {
       return $this->tva_vente;
    }
 
    /**
     * Set the value of tva_vente
     */
    public function setTvaVente($tva_vente): self
    {
       $this->tva_vente = $tva_vente;
 
       return $this;
    }

   /**
    * Get the value of stock
    */
   public function getStock()
   {
      return $this->stock;
   }

   /**
    * Set the value of stock
    */
   public function setStock($stock): self
   {
      $this->stock = $stock;

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