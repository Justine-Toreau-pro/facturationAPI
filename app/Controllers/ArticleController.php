<?php

namespace App\Controllers;

use App\Models\CoreModel;
use App\Models\Article;

use App\Controllers\CoreController;


class ArticleController extends CoreController
{

// ARTICLE
    public function list()
    {
        $articleList = CoreModel::findAll("Article");
        print_r($articleList);
    }


    public function edit($articleId)
    {
        $articleEdit = CoreModel::find("Article","id", $articleId);
        print_r($articleEdit);
    }


    public function new()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $code_article=$data["code_article"];
        $designation_article=$data["designation_article"];
        $fournisseur_id=$data["fournisseur_id"];
        $prix_achat_unitaire_ht=$data["prix_achat_unitaire_ht"];
        $tva_achat=$data["tva_achat"];
        $prix_vente_unitaire_ht=$data["prix_vente_unitaire_ht"];
        $tva_vente=$data["tva_vente"];
        $stock=$data["stock"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $article = new Article;
        
        $article->setId($id);
        $article->setCodeArticle($code_article);
        $article->setdesignationArticle($designation_article);
        $article->setFournisseurId($fournisseur_id);
        $article->setPrixAchatUnitaireHt($prix_achat_unitaire_ht);
        $article->setTvaAchat($tva_achat);
        $article->setPrixVenteUnitaireHt($prix_vente_unitaire_ht);
        $article->setTvaVente($tva_vente);
        $article->setStock($stock);
        $article->setCreatedAt($created_at);
        $article->setUpdatedAt($updated_at);
        
        $success=$article->insert("Article","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }
    }


    public function modif($articleId)
    {

        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $code_article=$data["code_article"];
        $designation_article=$data["designation_article"];
        $fournisseur_id=$data["fournisseur_id"];
        $prix_achat_unitaire_ht=$data["prix_achat_unitaire_ht"];
        $tva_achat=$data["tva_achat"];
        $prix_vente_unitaire_ht=$data["prix_vente_unitaire_ht"];
        $tva_vente=$data["tva_vente"];
        $stock=$data["stock"];
        $created_at=$data["created_at"];
        
        $article = new Article;
        
        $article->setCodeArticle($code_article);
        $article->setdesignationArticle($designation_article);
        $article->setFournisseurId($fournisseur_id);
        $article->setPrixAchatUnitaireHt($prix_achat_unitaire_ht);
        $article->setTvaAchat($tva_achat);
        $article->setPrixVenteUnitaireHt($prix_vente_unitaire_ht);
        $article->setTvaVente($tva_vente);
        $article->setStock($stock);
        $article->setCreatedAt($created_at);
        $article->setUpdatedAt(date("Y m j H i s"));
        
        $success=$article->update("Article", $data, $articleId);
    }


    public function supp($articleId)
    {
        CoreModel::delete("Article","id",$articleId);
    }

    
    public function corsoption()
    {
        CoreModel::cors();
    }
}