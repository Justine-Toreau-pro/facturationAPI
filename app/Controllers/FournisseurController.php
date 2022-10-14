<?php

namespace App\Controllers;

use App\Models\Fournisseur;
use App\Models\FournisseurDevis;
use App\Models\FournisseurBdc;
use App\Models\FournisseurBdl;
use App\Models\FournisseurFacture;
use App\Models\FournisseurDevisLigne;
use App\Models\FournisseurBdcLigne;
use App\Models\FournisseurBdlLigne;
use App\Models\FournisseurFactureLigne;

use App\Controllers\CoreController;
use App\Models\CoreModel;


class FournisseurController extends CoreController
{

// FOURNISSEUR
    public function list()
    {
        $fournisseurList = CoreModel::findAll("Fournisseur");
        print_r($fournisseurList);
    }


    public function edit($fournisseurId)
    {
        $fournisseurEdit = CoreModel::find("Fournisseur","id", $fournisseurId);
        print_r($fournisseurEdit);
    }


    public function new()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $numero_fournisseur=$data["numero_fournisseur"];
        $type_de_fournisseur=$data["type_de_fournisseur"];
        $numero_cpt_client=$data["numero_cpt_client"];
        $type_de_societe=$data["type_de_societe"];
        $raison_sociale=$data["raison_sociale"];
        $adresse_numero=$data["adresse_numero"];
        $adresse_bis_ter=$data["adresse_bis_ter"];
        $adresse_type_de_voie=$data["adresse_type_de_voie"];
        $adresse_nom_de_la_voie=$data["adresse_nom_de_la_voie"];
        $adresse_cp=$data["adresse_cp"];
        $adresse_ville=$data["adresse_ville"];
        $adresse_pays=$data["adresse_pays"];
        $telephone=$data["telephone"];
        $mail=$data["mail"];
        $site_web=$data["site_web"];
        $numero_siret=$data["numero_siret"];
        $numero_siren=$data["numero_siren"];
        $numero_tva=$data["numero_tva"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseur = new Fournisseur;
       
        $fournisseur->setId($id);
        $fournisseur->setNumero_fournisseur($numero_fournisseur);
        $fournisseur->setType_de_fournisseur($type_de_fournisseur);
        $fournisseur->setNumero_cpt_client($numero_cpt_client);
        $fournisseur->setType_de_societe($type_de_societe);
        $fournisseur->setRaison_sociale($raison_sociale);
        $fournisseur->setAdresse_numero($adresse_numero);
        $fournisseur->setAdresse_bis_ter($adresse_bis_ter);
        $fournisseur->setAdresse_type_de_voie($adresse_type_de_voie);
        $fournisseur->setAdresse_nom_de_la_voie($adresse_nom_de_la_voie);
        $fournisseur->setAdresse_cp($adresse_cp);
        $fournisseur->setAdresse_ville($adresse_ville);
        $fournisseur->setAdresse_pays($adresse_pays);
        $fournisseur->setTelephone($telephone);
        $fournisseur->setMail($mail);
        $fournisseur->setSite_web($site_web);
        $fournisseur->setNumero_siret($numero_siret);
        $fournisseur->setNumero_siren($numero_siren);
        $fournisseur->setNumero_tva($numero_tva);
        $fournisseur->setCreated_at($created_at);
        $fournisseur->setUpdated_at($updated_at);
      
        $success=$fournisseur->insert("Fournisseur","id",$id, $data);

    
        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
             echo 'Erreur à la sauvegarde.';
        }
    }


    public function modif($fournisseurId)
    {
        
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $numero_fournisseur=$data["numero_fournisseur"];
        $type_de_fournisseur=$data["type_de_fournisseur"];
        $numero_cpt_client=$data["numero_cpt_client"];
        $type_de_societe=$data["type_de_societe"];
        $raison_sociale=$data["raison_sociale"];
        $adresse_numero=$data["adresse_numero"];
        $adresse_bis_ter=$data["adresse_bis_ter"];
        $adresse_type_de_voie=$data["adresse_type_de_voie"];
        $adresse_nom_de_la_voie=$data["adresse_nom_de_la_voie"];
        $adresse_cp=$data["adresse_cp"];
        $adresse_ville=$data["adresse_ville"];
        $adresse_pays=$data["adresse_pays"];
        $telephone=$data["telephone"];
        $mail=$data["mail"];
        $site_web=$data["site_web"];
        $numero_siret=$data["numero_siret"];
        $numero_siren=$data["numero_siren"];
        $numero_tva=$data["numero_tva"];
        $created_at=$data["created_at"];

        $fournisseur = new Fournisseur;

        $fournisseur->setNumero_fournisseur($numero_fournisseur);
        $fournisseur->setType_de_fournisseur($type_de_fournisseur);
        $fournisseur->setNumero_cpt_client($numero_cpt_client);
        $fournisseur->setType_de_societe($type_de_societe);
        $fournisseur->setRaison_sociale($raison_sociale);
        $fournisseur->setAdresse_numero($adresse_numero);
        $fournisseur->setAdresse_bis_ter($adresse_bis_ter);
        $fournisseur->setAdresse_type_de_voie($adresse_type_de_voie);
        $fournisseur->setAdresse_nom_de_la_voie($adresse_nom_de_la_voie);
        $fournisseur->setAdresse_cp($adresse_cp);
        $fournisseur->setAdresse_ville($adresse_ville);
        $fournisseur->setAdresse_pays($adresse_pays);
        $fournisseur->setTelephone($telephone);
        $fournisseur->setMail($mail);
        $fournisseur->setSite_web($site_web);
        $fournisseur->setNumero_siret($numero_siret);
        $fournisseur->setNumero_siren($numero_siren);
        $fournisseur->setNumero_tva($numero_tva);
        $fournisseur->setCreated_at($created_at);
        $fournisseur->setUpdated_at(date("Y m j H i s"));
    
        $fournisseur->update("Fournisseur", $data, $fournisseurId);
    }


    public function supp($fournisseurId)
    {
        CoreModel::delete("Fournisseur","id",$fournisseurId);   
    }

    
    public function corsoption()
    {
        CoreModel::cors();  
    }



//FOURNISSEUR DEVIS
    public function listDevis()
    {
        $fournisseurListDevis = CoreModel::findAllJoin2("Fournisseur", "FournisseurDevis", "id", "id_fournisseur");
        print_r($fournisseurListDevis);
    }


    public function editDevis($fournisseurDevisId)
    { 
        $fournisseurDevisEdit = CoreModel::findJoin2("Fournisseur", "FournisseurDevis","id", $fournisseurDevisId, "FournisseurDevis", "Fournisseur", "FournisseurDevis", "id_fournisseur", "id" );
        print_r($fournisseurDevisEdit);
    }


    public function newDevis()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_fournisseur=$data["id_fournisseur"];
        $numero_devis=$data["numero_devis"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurDevis = new FournisseurDevis;
     
        $fournisseurDevis->setId($id);
        $fournisseurDevis->setIdFournisseur($id_fournisseur);
        $fournisseurDevis->setNumeroDevis($numero_devis);
        $fournisseurDevis->setCreatedAt($created_at);
        $fournisseurDevis->setUpdatedAt($updated_at);
        
        $success=$fournisseurDevis->insert("FournisseurDevis","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }
    }


    public function modifDevis($fournisseurDevisId)
    {

        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_fournisseur=$data["id_fournisseur"];
        $numero_devis=$data["numero_devis"];
        $created_at=$data["created_at"];
 
        $fournisseurDevis = new FournisseurDevis;
        
        $fournisseurDevis->setIdFournisseur($id_fournisseur);
        $fournisseurDevis->setNumeroDevis($numero_devis);
        $fournisseurDevis->setCreatedAt($created_at);
        $fournisseurDevis->setUpdatedAt(date("Y m j H i s"));
        
        $fournisseurDevis->update("FournisseurDevis", $data, $fournisseurDevisId);
    }


    public function suppDevis($fournisseurDevisId)
    {
        CoreModel::delete("FournisseurDevis","id",$fournisseurDevisId);
    }

    
    public function corsoptionDevis()
    {
        CoreModel::cors(); 
    }



//FOURNISSEUR BDC
    public function listBdc()
    {
        $fournisseurListBdc = CoreModel::findAllJoin2("Fournisseur", "FournisseurBdc", "id", "id_fournisseur");
        print_r($fournisseurListBdc);
    }


    public function editBdc($fournisseurBdcId)
    {
        $fournisseurBdcEdit = CoreModel::findJoin2("Fournisseur", "FournisseurBdc","id", $fournisseurBdcId, "FournisseurBdc", "Fournisseur", "FournisseurBdc", "id_fournisseur", "id" );
        print_r($fournisseurBdcEdit);
    }


    public function newBdc()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_fournisseur=$data["id_fournisseur"];
        $numero_bdc=$data["numero_bdc"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurBdc = new FournisseurBdc;

        $fournisseurBdc->setId($id);
        $fournisseurBdc->setIdFournisseur($id_fournisseur);
        $fournisseurBdc->setNumeroBdc($numero_bdc);
        $fournisseurBdc->setCreatedAt($created_at);
        $fournisseurBdc->setUpdatedAt($updated_at);
   
        $success=$fournisseurBdc->insert("FournisseurBdc","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
       echo 'Erreur à la sauvegarde.';
        }
    }


    public function modifBdc($fournisseurBdcId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        
        $id_fournisseur=$data["id_fournisseur"];
        $numero_bdc=$data["numero_bdc"];
        $created_at=$data["created_at"];
        
        $fournisseurBdc = new FournisseurBdc;
        
        $fournisseurBdc->setIdFournisseur($id_fournisseur);
        $fournisseurBdc->setNumeroBdc($numero_bdc);
        $fournisseurBdc->setCreatedAt($created_at);
        $fournisseurBdc->setUpdatedAt(date("Y m j H i s"));
        
        $fournisseurBdc->update("FournisseurBdc", $data, $fournisseurBdcId);
    }


    public function suppBdc($fournisseurBdcId)
    {
        CoreModel::delete("FournisseurBdc","id",$fournisseurBdcId);
    }

    
    public function corsoptionBdc()
    {
        CoreModel::cors();  
    }



//FOURNISSEUR BDL
    public function listBdl()
        {
            $fournisseurListBdl = CoreModel::findAllJoin2("Fournisseur", "FournisseurBdl", "id", "id_fournisseur");
            print_r($fournisseurListBdl);
        }


    public function editBdl($fournisseurBdlId)
        {
            $fournisseurBdlEdit = CoreModel::findJoin2("Fournisseur", "FournisseurBdl","id", $fournisseurBdlId, "FournisseurBdl", "Fournisseur", "FournisseurBdl", "id_fournisseur", "id" );
            print_r($fournisseurBdlEdit);
        }


        public function newBdl()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_fournisseur=$data["id_fournisseur"];
        $numero_bdl=$data["numero_bdl"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurBdl = new FournisseurBdl;

        $fournisseurBdl->setId($id);
        $fournisseurBdl->setIdFournisseur($id_fournisseur);
        $fournisseurBdl->setNumeroBdl($numero_bdl);
        $fournisseurBdl->setCreatedAt($created_at);
        $fournisseurBdl->setUpdatedAt($updated_at);
        
        $success=$fournisseurBdl->insert("FournisseurBdl","id",$id, $data);

    
        if ($success) 
        {
            echo 'sauvegarde ok.';   
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }            
    }


    public function modifBdl($fournisseurBdlId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_fournisseur=$data["id_fournisseur"];
        $numero_bdl=$data["numero_bdl"];
        $created_at=$data["created_at"];
        
        $fournisseurBdl = new FournisseurBdl;
        
        $fournisseurBdl->setIdFournisseur($id_fournisseur);
        $fournisseurBdl->setNumeroBdl($numero_bdl);
        $fournisseurBdl->setCreatedAt($created_at);
        $fournisseurBdl->setUpdatedAt(date("Y m j H i s"));

        $fournisseurBdl->update("FournisseurBdl", $data, $fournisseurBdlId);  
    }


    public function suppBdl($fournisseurBdlId)
    { 
        CoreModel::delete("FournisseurBdl","id",$fournisseurBdlId);  
    }

    
    public function corsoptionBdl()
    {
        CoreModel::cors();
    }



//FOURNISSEUR FACTURE
    public function listFacture()
    {
        $fournisseurListFacture = CoreModel::findAllJoin2("Fournisseur", "FournisseurFacture", "id", "id_fournisseur");
        print_r($fournisseurListFacture);
    }


    public function editFacture($fournisseurFactureId)
    {
        $fournisseurFactureEdit = CoreModel::findJoin2("Fournisseur", "FournisseurFacture","id", $fournisseurFactureId, "FournisseurFacture", "Fournisseur", "FournisseurFacture", "id_fournisseur", "id" );
        print_r($fournisseurFactureEdit);
    }


    public function newFacture()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_fournisseur=$data["id_fournisseur"];
        $numero_facture=$data["numero_facture"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurFacture = new FournisseurFacture;
   
        $fournisseurFacture->setId($id);
        $fournisseurFacture->setIdFournisseur($id_fournisseur);
        $fournisseurFacture->setNumeroFacture($numero_facture);
        $fournisseurFacture->setCreatedAt($created_at);
        $fournisseurFacture->setUpdatedAt($updated_at);

        $success=$fournisseurFacture->insert("FournisseurFacture","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';   
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }      
    }


    public function modifFacture($fournisseurFactureId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_fournisseur=$data["id_fournisseur"];
        $numero_facture=$data["numero_facture"];
        $created_at=$data["created_at"];
        
        $fournisseurFacture = new FournisseurFacture;

        $fournisseurFacture->setIdFournisseur($id_fournisseur);
        $fournisseurFacture->setNumeroFacture($numero_facture);
        $fournisseurFacture->setCreatedAt($created_at);
        $fournisseurFacture->setUpdatedAt(date("Y m j H i s"));

        $fournisseurFacture->update("FournisseurFacture", $data, $fournisseurFactureId);
    }


    public function suppFacture($fournisseurFactureId)
    {
        CoreModel::delete("FournisseurFacture","id",$fournisseurFactureId);
    }

    
    public function corsoptionFacture()
    {
        CoreModel::cors();  
    }



//FOURNISSEUR DEVIS LIGNE
    public function listDevisLigne()
    {
        $fournisseurListDevisLigne = CoreModel::findAllJoin4("Article", "FournisseurDevis", "Fournisseur", "FournisseurDevisLigne", "FournisseurDevis", "Fournisseur", "FournisseurDevis", "FournisseurDevisLigne", "Article", "FournisseurDevisLigne", "id_fournisseur", "id", "id", "id_devis", "id", "id_article");
        print_r($fournisseurListDevisLigne);
    }


    public function editDevisLigne($fournisseurDevisLigneId)
    {
        $fournisseurDevisLigneEdit = CoreModel::findJoin3("Article", "FournisseurDevis", "FournisseurDevisLigne", "id", $fournisseurDevisLigneId, "FournisseurDevisLigne", "FournisseurDevis", "Article", "FournisseurDevisLigne", "FournisseurDevisLigne", "id_devis", "id", "id", "id_article" );
        print_r($fournisseurDevisLigneEdit);
    }


    public function editDevisAllLignesOneDevis($fournisseurDevisId)
    {

        $fournisseurDevisLignesEdit = CoreModel::findJoin3("Article", "FournisseurDevis", "FournisseurDevisLigne", "id", $fournisseurDevisId, "FournisseurDevisLigne", "FournisseurDevis", "Article", "FournisseurDevisLigne", "FournisseurDevis", "id_devis", "id", "id", "id_article" );
        print_r($fournisseurDevisLignesEdit);
    }


    public function newDevisLigne()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_devis=$data["id_devis"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurDevisLigne = new FournisseurDevisLigne;

        $fournisseurDevisLigne->setId($id);
        $fournisseurDevisLigne->setIdDevis($id_devis);
        $fournisseurDevisLigne->setIdArticle($id_article);
        $fournisseurDevisLigne->setQuantity($quantity);
        $fournisseurDevisLigne->setCreatedAt($created_at);
        $fournisseurDevisLigne->setUpdatedAt($updated_at);

        $success=$fournisseurDevisLigne->insert("FournisseurDevisLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }  
    }


    public function modifDevisLigne($fournisseurDevisLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_devis=$data["id_devis"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $fournisseurDevisLigne = new FournisseurDevisLigne;

        $fournisseurDevisLigne->setIdDevis($id_devis);
        $fournisseurDevisLigne->setIdArticle($id_article);
        $fournisseurDevisLigne->setQuantity($quantity);
        $fournisseurDevisLigne->setCreatedAt($created_at);
        $fournisseurDevisLigne->setUpdatedAt(date("Y m j H i s"));
        
        $fournisseurDevisLigne->update("FournisseurDevisLigne", $data, $fournisseurDevisLigneId) ;
    }


    public function suppDevisLigne($fournisseurDevisLigneId)
    {  
        CoreModel::delete("FournisseurDevisLigne","id",$fournisseurDevisLigneId);
    }

    
    public function corsoptionDevisLigne()
    {
        CoreModel::cors();  
    }



//FOURNISSEUR BDC LIGNE
    public function listBdcLigne()
    {
        $fournisseurListBdcLigne = CoreModel::findAllJoin4("Article", "FournisseurBdc", "Fournisseur", "FournisseurBdcLigne", "FournisseurBdc", "Fournisseur", "FournisseurBdc", "FournisseurBdcLigne", "Article", "FournisseurBdcLigne", "id_fournisseur", "id", "id", "id_bdc", "id", "id_article");
        print_r($fournisseurListBdcLigne);
    }


    public function editBdcLigne($fournisseurBdcLigneId)
    {
        $fournisseurBdcLigneEdit = CoreModel::findJoin3("Article", "FournisseurBdc", "FournisseurBdcLigne","id", $fournisseurBdcLigneId, "FournisseurBdcLigne", "FournisseurBdc", "Article", "FournisseurBdcLigne", "FournisseurBdcLigne", "id_bdc", "id", "id", "id_article" );
        print_r($fournisseurBdcLigneEdit);
    }


    public function editBdcAllLignesOneBdc($fournisseurBdcId)
    {
        $fournisseurBdcLignesEdit = CoreModel::findJoin3("Article", "FournisseurBdc", "FournisseurBdcLigne", "id", $fournisseurBdcId, "FournisseurBdcLigne", "FournisseurBdc", "Article", "FournisseurBdcLigne", "FournisseurBdc", "id_bdc", "id", "id", "id_article" );
        print_r($fournisseurBdcLignesEdit);
    }


    public function newBdcLigne()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_Bdc=$data["id_Bdc"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurBdcLigne = new FournisseurBdcLigne;
        
        $fournisseurBdcLigne->setId($id);
        $fournisseurBdcLigne->setIdBdc($id_Bdc);
        $fournisseurBdcLigne->setIdArticle($id_article);
        $fournisseurBdcLigne->setQuantity($quantity);
        $fournisseurBdcLigne->setCreatedAt($created_at);
        $fournisseurBdcLigne->setUpdatedAt($updated_at);
        
        $success=$fournisseurBdcLigne->insert("FournisseurBdcLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        { 
            echo 'Erreur à la sauvegarde.';
        }  
    }


    public function modifBdcLigne($fournisseurBdcLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_bdc=$data["id_bdc"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $fournisseurBdcLigne = new FournisseurBdcLigne;
     
        $fournisseurBdcLigne->setIdBdc($id_bdc);
        $fournisseurBdcLigne->setIdArticle($id_article);
        $fournisseurBdcLigne->setQuantity($quantity);
        $fournisseurBdcLigne->setCreatedAt($created_at);
        $fournisseurBdcLigne->setUpdatedAt(date("Y m j H i s"));
        
        $fournisseurBdcLigne->update("FournisseurBdcLigne", $data, $fournisseurBdcLigneId) ;
    }


    public function suppBdcLigne($fournisseurBdcLigneId)
    {
        CoreModel::delete("FournisseurBdcLigne","id",$fournisseurBdcLigneId);
    }

    
    public function corsoptionBdcLigne()
    {
        CoreModel::cors();
    }



//FOURNISSEUR BDL LIGNE
    public function listBdlLigne()
    {
        $fournisseurListBdlLigne = CoreModel::findAllJoin4("Article","FournisseurBdl", "Fournisseur", "FournisseurBdlLigne", "FournisseurBdl", "Fournisseur", "FournisseurBdl", "FournisseurBdlLigne", "Article", "FournisseurBdlLigne", "id_fournisseur", "id", "id", "id_bdl", "id", "id_article");
        print_r($fournisseurListBdlLigne);   
    }


    public function editBdlLigne($fournisseurBdlLigneId)
    {
        $fournisseurBdlLigneEdit = CoreModel::findJoin3("Article", "FournisseurBdl", "FournisseurBdlLigne","id", $fournisseurBdlLigneId, "FournisseurBdlLigne", "FournisseurBdl", "Article", "FournisseurBdlLigne", "FournisseurBdlLigne", "id_bdl", "id", "id", "id_article" );
        print_r($fournisseurBdlLigneEdit);
    }


    public function editBdlAllLignesOneBdl($fournisseurBdlId)
    {
        $fournisseurBdlLignesEdit = CoreModel::findJoin3("Article", "FournisseurBdl", "FournisseurBdlLigne", "id", $fournisseurBdlId, "FournisseurBdlLigne", "FournisseurBdl", "Article", "FournisseurBdlLigne", "FournisseurBdl", "id_bdl", "id", "id", "id_article" );
        print_r($fournisseurBdlLignesEdit);
    }


    public function newBdlLigne()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_bdl=$data["id_bdl"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurBdlLigne = new FournisseurBdlLigne;
     
        $fournisseurBdlLigne->setId($id);
        $fournisseurBdlLigne->setIdBdl($id_bdl);
        $fournisseurBdlLigne->setIdArticle($id_article);
        $fournisseurBdlLigne->setQuantity($quantity);
        $fournisseurBdlLigne->setCreatedAt($created_at);
        $fournisseurBdlLigne->setUpdatedAt($updated_at);
        
        $success=$fournisseurBdlLigne->insert("FournisseurBdlLigne","id",$id, $data);

   
        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }   
    }


    public function modifBdlLigne($fournisseurBdlLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        
        $id_bdl=$data["id_bdl"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $fournisseurBdlLigne = new FournisseurBdlLigne;

        $fournisseurBdlLigne->setIdBdl($id_bdl);
        $fournisseurBdlLigne->setIdArticle($id_article);
        $fournisseurBdlLigne->setQuantity($quantity);
        $fournisseurBdlLigne->setCreatedAt($created_at);
        $fournisseurBdlLigne->setUpdatedAt(date("Y m j H i s"));
        
        $fournisseurBdlLigne->update("FournisseurBdlLigne", $data, $fournisseurBdlLigneId);
    }


    public function suppBdlLigne($fournisseurBdlLigneId)
    { 
        CoreModel::delete("FournisseurBdlLigne","id",$fournisseurBdlLigneId); 
    }

    
    public function corsoptionBdlLigne()
    {
        CoreModel::cors();
    }


    
//FOURNISSEUR FACTURE LIGNE
    public function listFactureLigne()
    {
        $fournisseurListFactureLigne = CoreModel::findAllJoin4("Article","FournisseurFacture", "Fournisseur", "FournisseurFactureLigne", "FournisseurFacture", "Fournisseur", "FournisseurFacture", "FournisseurFactureLigne", "Article", "FournisseurFactureLigne", "id_fournisseur", "id", "id", "id_facture", "id", "id_article");
        print_r($fournisseurListFactureLigne);
    }


    public function editFactureLigne($fournisseurFactureLigneId)
    {
        $fournisseurFactureLigneEdit = CoreModel::findJoin3("Article", "FournisseurFacture", "FournisseurFactureLigne","id", $fournisseurFactureLigneId, "FournisseurFactureLigne", "FournisseurFacture", "Article", "FournisseurFactureLigne", "FournisseurFactureLigne", "id_facture", "id", "id", "id_article" );
        print_r($fournisseurFactureLigneEdit);
    }


    public function editFactureAllLignesOneFacture($fournisseurFactureId)
    {
        $fournisseurFactureLignesEdit = CoreModel::findJoin3("Article", "FournisseurFacture", "FournisseurFactureLigne", "id", $fournisseurFactureId, "FournisseurFactureLigne", "FournisseurFacture", "Article", "FournisseurFactureLigne", "FournisseurFacture", "id_facture", "id", "id", "id_article" );
        print_r($fournisseurFactureLignesEdit);
    }


    public function newFactureLigne()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_facture=$data["id_facture"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $fournisseurFactureLigne = new FournisseurFactureLigne;
   
        $fournisseurFactureLigne->setId($id);
        $fournisseurFactureLigne->setIdFacture($id_facture);
        $fournisseurFactureLigne->setIdArticle($id_article);
        $fournisseurFactureLigne->setQuantity($quantity);
        $fournisseurFactureLigne->setCreatedAt($created_at);
        $fournisseurFactureLigne->setUpdatedAt($updated_at);
        
        $success=$fournisseurFactureLigne->insert("FournisseurFactureLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        } 
    }


    public function modifFactureLigne($fournisseurFactureLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_facture=$data["id_facture"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];
   
        $fournisseurFactureLigne = new FournisseurFactureLigne;
        
        $fournisseurFactureLigne->setIdFacture($id_facture);
        $fournisseurFactureLigne->setIdArticle($id_article);
        $fournisseurFactureLigne->setQuantity($quantity);
        $fournisseurFactureLigne->setCreatedAt($created_at);
        $fournisseurFactureLigne->setUpdatedAt(date("Y m j H i s"));
        
        $fournisseurFactureLigne->update("FournisseurFactureLigne", $data, $fournisseurFactureLigneId);
    }


    public function suppFactureLigne($fournisseurFactureLigneId)
    {
        CoreModel::delete("FournisseurFactureLigne","id",$fournisseurFactureLigneId);
    }

    
    public function corsoptionFactureLigne()
    {
        CoreModel::cors(); 
    }
}