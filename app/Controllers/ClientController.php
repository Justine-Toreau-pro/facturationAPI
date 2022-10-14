<?php

namespace App\Controllers;

use App\Models\CoreModel;
use App\Models\Client;
use App\Models\ClientDevis;
use App\Models\ClientBdc;
use App\Models\ClientBdl;
use App\Models\ClientFacture;
use App\Models\ClientDevisLigne;
use App\Models\ClientBdcLigne;
use App\Models\ClientBdlLigne;
use App\Models\ClientFactureLigne;

use App\Controllers\CoreController;


class ClientController extends CoreController
{

//CLIENT
    public function list()
    {
        $clientList = CoreModel::findAll("Client");
        print_r($clientList);
    }


    public function edit($clientId)
    {
        $clientEdit = CoreModel::find("Client","id", $clientId);
        print_r($clientEdit);
    }


    public function new()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $numero_client=$data["numero_client"];
        $type_de_client=$data["type_de_client"];
        $numero_cpt_fournisseur=$data["numero_cpt_fournisseur"];
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
        
        $client = new Client;

        $client->setId($id);
        $client->setNumeroClient($numero_client);
        $client->setTypeDeClient($type_de_client);
        $client->setNumeroCptFournisseur($numero_cpt_fournisseur);
        $client->setTypeDeSociete($type_de_societe);
        $client->setRaisonSociale($raison_sociale);
        $client->setAdresseNumero($adresse_numero);
        $client->setAdresseBisTer($adresse_bis_ter);
        $client->setAdresseTypeDeVoie($adresse_type_de_voie);
        $client->setAdresseNomDeLaVoie($adresse_nom_de_la_voie);
        $client->setAdresseCp($adresse_cp);
        $client->setAdresseVille($adresse_ville);
        $client->setAdressePays($adresse_pays);
        $client->setTelephone($telephone);
        $client->setMail($mail);
        $client->setSiteWeb($site_web);
        $client->setNumeroSiret($numero_siret);
        $client->setNumeroSiren($numero_siren);
        $client->setNumeroTva($numero_tva);
        $client->setCreatedAt($created_at);
        $client->setUpdatedAt($updated_at);
        
        $success=$client->insert("Client","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }   
    }


    public function modif($clientId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $numero_client=$data["numero_client"];
        $type_de_client=$data["type_de_client"];
        $numero_cpt_fournisseur=$data["numero_cpt_fournisseur"];
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
        
        $client = new Client;

        $client->setNumeroClient($numero_client);
        $client->setTypeDeClient($type_de_client);
        $client->setNumeroCptFournisseur($numero_cpt_fournisseur);
        $client->setTypeDeSociete($type_de_societe);
        $client->setRaisonSociale($raison_sociale);
        $client->setAdresseNumero($adresse_numero);
        $client->setAdresseBisTer($adresse_bis_ter);
        $client->setAdresseTypeDeVoie($adresse_type_de_voie);
        $client->setAdresseNomDeLaVoie($adresse_nom_de_la_voie);
        $client->setAdresseCp($adresse_cp);
        $client->setAdresseVille($adresse_ville);
        $client->setAdressePays($adresse_pays);
        $client->setTelephone($telephone);
        $client->setMail($mail);
        $client->setSiteWeb($site_web);
        $client->setNumeroSiret($numero_siret);
        $client->setNumeroSiren($numero_siren);
        $client->setNumeroTva($numero_tva);
        $client->setCreatedAt($created_at);
        $client->setUpdatedAt(date("Y m j H i s"));
        
        $success=$client->update("Client", $data, $clientId);     
    }


    public function supp($clientId)
    {
        CoreModel::delete("Client","id",$clientId);
    }

    
    public function corsoption()
    {
        CoreModel::cors();
    }



//CLIENT DEVIS
    public function listDevis()
    {
        $clientListDevis = CoreModel::findAllJoin2("Client", "ClientDevis", "id", "id_client");
        print_r($clientListDevis);
    }


    public function editDevis($clientDevisId)
    {
        $clientDevisEdit = CoreModel::findJoin2("Client", "ClientDevis","id", $clientDevisId, "ClientDevis", "Client", "ClientDevis", "id_client", "id" );
        print_r($clientDevisEdit);
    }


    public function newDevis()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_client=$data["id_client"];
        $numero_devis=$data["numero_devis"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $clientDevis = new ClientDevis;
 
        $clientDevis->setId($id);
        $clientDevis->setIdClient($id_client);
        $clientDevis->setNumeroDevis($numero_devis);
        $clientDevis->setCreatedAt($created_at);
        $clientDevis->setUpdatedAt($updated_at);
  
        $success=$clientDevis->insert("ClientDevis","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        } 
    }


    public function modifDevis($clientDevisId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_client=$data["id_client"];
        $numero_devis=$data["numero_devis"];
        $created_at=$data["created_at"];
        
        $clientDevis = new ClientDevis;
 
        $clientDevis->setIdClient($id_client);
        $clientDevis->setNumeroDevis($numero_devis);
        $clientDevis->setCreatedAt($created_at);
        $clientDevis->setUpdatedAt(date("Y m j H i s"));
  
        $success=$clientDevis->update("ClientDevis", $data, $clientDevisId);
    }


    public function suppDevis($clientDevisId)
    {
        CoreModel::delete("ClientDevis","id",$clientDevisId);
    }

    
    public function corsoptionDevis()
    {
        CoreModel::cors();
    }



//CLIENT BDC
    public function listBdc()
    {
        $clientListBdc = CoreModel::findAllJoin2("Client", "ClientBdc", "id", "id_client");
        print_r($clientListBdc);
    }


    public function editBdc($clientBdcId)
    {
        $clientBdcEdit = CoreModel::findJoin2("Client", "ClientBdc","id", $clientBdcId, "ClientBdc", "Client", "ClientBdc", "id_client", "id" );
        print_r($clientBdcEdit);
    }


    public function newBdc()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_client=$data["id_client"];
        $numero_bdc=$data["numero_bdc"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $clientBdc = new ClientBdc;
        
        $clientBdc->setId($id);
        $clientBdc->setIdClient($id_client);
        $clientBdc->setNumeroBdc($numero_bdc);
        $clientBdc->setCreatedAt($created_at);
        $clientBdc->setUpdatedAt($updated_at);

        $success=$clientBdc->insert("ClientBdc","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }
    }


    public function modifBdc($clientBdcId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_client=$data["id_client"];
        $numero_bdc=$data["numero_bdc"];
        $created_at=$data["created_at"];
        
        $clientBdc = new ClientBdc;
        
        $clientBdc->setIdClient($id_client);
        $clientBdc->setNumeroBdc($numero_bdc);
        $clientBdc->setCreatedAt($created_at);
        $clientBdc->setUpdatedAt(date("Y m j H i s"));

        $success=$clientBdc->update("ClientBdc", $data, $clientBdcId);
    }


    public function suppBdc($clientBdcId)
    {
        CoreModel::delete("ClientBdc","id",$clientBdcId);
    }

    
    public function corsoptionBdc()
    {
        CoreModel::cors();
    }



//CLIENT BDL
    public function listBdl()
    {
        $clientListBdl = CoreModel::findAllJoin2("Client", "ClientBdl", "id", "id_client");
        print_r($clientListBdl);
    }


    public function editBdl($clientBdlId)
    {
        $clientBdlEdit = CoreModel::findJoin2("Client", "ClientBdl","id", $clientBdlId, "ClientBdl", "Client", "ClientBdl", "id_client", "id" );
        print_r($clientBdlEdit);
    }


    public function newBdl()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_client=$data["id_client"];
        $numero_bdl=$data["numero_bdl"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $clientBdl = new ClientBdl;

        $clientBdl->setId($id);
        $clientBdl->setIdClient($id_client);
        $clientBdl->setNumeroBdl($numero_bdl);
        $clientBdl->setCreatedAt($created_at);
        $clientBdl->setUpdatedAt($updated_at);

        $success=$clientBdl->insert("ClientBdl","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }
    }


    public function modifBdl($clientBdlId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_client=$data["id_client"];
        $numero_bdl=$data["numero_bdl"];
        $created_at=$data["created_at"];
        
        $clientBdl = new ClientBdl;

        $clientBdl->setIdClient($id_client);
        $clientBdl->setNumeroBdl($numero_bdl);
        $clientBdl->setCreatedAt($created_at);
        $clientBdl->setUpdatedAt(date("Y m j H i s"));

        $success=$clientBdl->update("ClientBdl", $data, $clientBdlId);
    }


    public function suppBdl($clientBdlId)
    { 
        CoreModel::delete("ClientBdl","id",$clientBdlId);   
    }

    
    public function corsoptionBdl()
    {
        CoreModel::cors();
    }

    

//CLIENT FACTURE
    public function listFacture()
    {
        $clientListFacture = CoreModel::findAllJoin2("Client", "ClientFacture", "id", "id_client");
        print_r($clientListFacture);
    }


    public function editFacture($clientFactureId)
    {
        $clientFactureEdit = CoreModel::findJoin2("Client", "ClientFacture","id", $clientFactureId, "ClientFacture", "Client", "ClientFacture", "id_client", "id" );
        print_r($clientFactureEdit);
    }


    public function newFacture()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_client=$data["id_client"];
        $numero_facture=$data["numero_facture"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $clientFacture = new ClientFacture;
        
        $clientFacture->setId($id);
        $clientFacture->setIdClient($id_client);
        $clientFacture->setNumeroFacture($numero_facture);
        $clientFacture->setCreatedAt($created_at);
        $clientFacture->setUpdatedAt($updated_at);

        $success=$clientFacture->insert("ClientFacture","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }
    }


    public function modifFacture($clientFactureId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_client=$data["id_client"];
        $numero_facture=$data["numero_facture"];
        $created_at=$data["created_at"];
        
        $clientFacture = new ClientFacture;

        $clientFacture->setIdClient($id_client);
        $clientFacture->setNumeroFacture($numero_facture);
        $clientFacture->setCreatedAt($created_at);
        $clientFacture->setUpdatedAt(date("Y m j H i s"));

        $success=$clientFacture->update("ClientFacture", $data, $clientFactureId);  
    }


    public function suppFacture($clientFactureId)
    {
        CoreModel::delete("ClientFacture","id",$clientFactureId); 
    }

    
    public function corsoptionFacture()
    {
        CoreModel::cors(); 
    }



//CLIENT DEVIS LIGNE
    public function listDevisLigne()
    {
        $clientListDevisLigne = CoreModel::findAllJoin4("Article", "ClientDevis", "Client", "ClientDevisLigne", "ClientDevis", "Client", "ClientDevis", "ClientDevisLigne", "Article", "ClientDevisLigne", "id_client", "id", "id", "id_devis", "id", "id_article");
        print_r($clientListDevisLigne);
    }


    public function editDevisLigne($clientDevisLigneId)
    {
        $clientDevisLigneEdit = CoreModel::findJoin3("Article", "ClientDevis", "ClientDevisLigne", "id", $clientDevisLigneId, "ClientDevisLigne", "ClientDevis", "Article", "ClientDevisLigne", "ClientDevisLigne", "id_devis", "id", "id", "id_article" );
        print_r($clientDevisLigneEdit);
    }


    public function editDevisAllLignesOneDevis($clientDevisId)
    {

        $clientDevisLignesEdit = CoreModel::findJoin3("Article", "ClientDevis", "ClientDevisLigne", "id", $clientDevisId, "ClientDevisLigne", "ClientDevis", "Article", "ClientDevisLigne", "ClientDevis", "id_devis", "id", "id", "id_article");
        print_r($clientDevisLignesEdit);
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
        
        $clientDevisLigne = new ClientDevisLigne;

        $clientDevisLigne->setId($id);
        $clientDevisLigne->setIdDevis($id_devis);
        $clientDevisLigne->setIdArticle($id_article);
        $clientDevisLigne->setQuantity($quantity);
        $clientDevisLigne->setCreatedAt($created_at);
        $clientDevisLigne->setUpdatedAt($updated_at);

        $success=$clientDevisLigne->insert("ClientDevisLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }  
    }


    public function modifDevisLigne($clientDevisLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_devis=$data["id_devis"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $clientDevisLigne = new ClientDevisLigne;

        $clientDevisLigne->setIdDevis($id_devis);
        $clientDevisLigne->setIdArticle($id_article);
        $clientDevisLigne->setQuantity($quantity);
        $clientDevisLigne->setCreatedAt($created_at);
        $clientDevisLigne->setUpdatedAt(date("Y m j H i s"));
        
        $clientDevisLigne->update("ClientDevisLigne", $data, $clientDevisLigneId) ;
    }


    public function suppDevisLigne($clientDevisLigneId)
    {  
        CoreModel::delete("ClientDevisLigne","id",$clientDevisLigneId);
    }

    
    public function corsoptionDevisLigne()
    {
        CoreModel::cors();  
    }



//CLIENT BDC LIGNE
    public function listBdcLigne()
    {
        $clientListBdcLigne = CoreModel::findAllJoin4("Article", "ClientBdc", "Client", "ClientBdcLigne", "ClientBdc", "Client", "ClientBdc", "ClientBdcLigne", "Article", "ClientBdcLigne", "id_client", "id", "id", "id_bdc", "id", "id_article");
        print_r($clientListBdcLigne);
    }


    public function editBdcLigne($clientBdcLigneId)
    {
        $clientBdcLigneEdit = CoreModel::findJoin3("Article", "ClientBdc", "ClientBdcLigne", "id", $clientBdcLigneId, "ClientBdcLigne", "ClientBdc", "Article", "ClientBdcLigne", "ClientBdcLigne", "id_bdc", "id", "id", "id_article");
        print_r($clientBdcLigneEdit);
    }


    public function editBdcAllLignesOneBdc($clientBdcId)
    {

        $clientBdcLignesEdit = CoreModel::findJoin3("Article", "ClientBdc", "ClientBdcLigne", "id", $clientBdcId, "ClientBdcLigne", "ClientBdc", "Article", "ClientBdcLigne", "ClientBdc", "id_bdc", "id", "id", "id_article" );
        print_r($clientBdcLignesEdit);
    }


    public function newBdcLigne()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id = $data["id"];
        $id_bdc=$data["id_bdc"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];
        $updated_at=$data["updated_at"];
        
        $clientBdcLigne = new ClientBdcLigne;

        $clientBdcLigne->setId($id);
        $clientBdcLigne->setIdBdc($id_bdc);
        $clientBdcLigne->setIdArticle($id_article);
        $clientBdcLigne->setQuantity($quantity);
        $clientBdcLigne->setCreatedAt($created_at);
        $clientBdcLigne->setUpdatedAt($updated_at);

        $success=$clientBdcLigne->insert("ClientBdcLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }  
    }


    public function modifBdcLigne($clientBdcLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_bdc=$data["id_bdc"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $clientBdcLigne = new ClientBdcLigne;

        $clientBdcLigne->setIdBdc($id_bdc);
        $clientBdcLigne->setIdArticle($id_article);
        $clientBdcLigne->setQuantity($quantity);
        $clientBdcLigne->setCreatedAt($created_at);
        $clientBdcLigne->setUpdatedAt(date("Y m j H i s"));
        
        $clientBdcLigne->update("ClientBdcLigne", $data, $clientBdcLigneId) ;
    }


    public function suppBdcLigne($clientBdcLigneId)
    {  
        CoreModel::delete("ClientBdcLigne","id",$clientBdcLigneId);
    }

    
    public function corsoptionBdcLigne()
    {
        CoreModel::cors();  
    }



//CLIENT BDL LIGNE
    public function listBdlLigne()
    {
        $clientListBdlLigne = CoreModel::findAllJoin4("Article", "ClientBdl", "Client", "ClientBdlLigne", "ClientBdl", "Client", "ClientBdl", "ClientBdlLigne", "Article", "ClientBdlLigne", "id_client", "id", "id", "id_bdl", "id", "id_article");
        print_r($clientListBdlLigne);
    }


    public function editBdlLigne($clientBdlLigneId)
    {
        $clientBdlLigneEdit = CoreModel::findJoin3("Article", "ClientBdl", "ClientBdlLigne", "id", $clientBdlLigneId, "ClientBdlLigne", "ClientBdl", "Article", "ClientBdlLigne", "ClientBdlLigne", "id_bdl", "id", "id", "id_article");
        print_r($clientBdlLigneEdit);
    }


    public function editBdlAllLignesOneBdl($clientBdlId)
    {

        $clientBdlLignesEdit = CoreModel::findJoin3("Article", "ClientBdl", "ClientBdlLigne", "id", $clientBdlId, "ClientBdlLigne", "ClientBdl", "Article", "ClientBdlLigne", "ClientBdl", "id_bdl", "id", "id", "id_article" );
        print_r($clientBdlLignesEdit);
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
        
        $clientBdlLigne = new ClientBdlLigne;

        $clientBdlLigne->setId($id);
        $clientBdlLigne->setIdBdl($id_bdl);
        $clientBdlLigne->setIdArticle($id_article);
        $clientBdlLigne->setQuantity($quantity);
        $clientBdlLigne->setCreatedAt($created_at);
        $clientBdlLigne->setUpdatedAt($updated_at);

        $success=$clientBdlLigne->insert("ClientBdlLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }  
    }


    public function modifBdlLigne($clientBdlLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_bdl=$data["id_bdl"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $clientBdlLigne = new ClientBdlLigne;

        $clientBdlLigne->setIdBdl($id_bdl);
        $clientBdlLigne->setIdArticle($id_article);
        $clientBdlLigne->setQuantity($quantity);
        $clientBdlLigne->setCreatedAt($created_at);
        $clientBdlLigne->setUpdatedAt(date("Y m j H i s"));
        
        $clientBdlLigne->update("ClientBdlLigne", $data, $clientBdlLigneId) ;
    }


    public function suppBdlLigne($clientBdlLigneId)
    {  
        CoreModel::delete("ClientBdlLigne","id",$clientBdlLigneId);
    }

    
    public function corsoptionBdlLigne()
    {
        CoreModel::cors();  
    }



//CLIENT FACTURE LIGNE
    public function listFactureLigne()
    {
        $clientListFactureLigne = CoreModel::findAllJoin4("Article", "ClientFacture", "Client", "ClientFactureLigne", "ClientFacture", "Client", "ClientFacture", "ClientFactureLigne", "Article", "ClientFactureLigne", "id_client", "id", "id", "id_facture", "id", "id_article");
        print_r($clientListFactureLigne);
    }


    public function editFactureLigne($clientFactureLigneId)
    {
        $clientFactureLigneEdit = CoreModel::findJoin3("Article", "ClientFacture", "ClientFactureLigne", "id", $clientFactureLigneId, "ClientFactureLigne", "ClientFacture", "Article", "ClientFactureLigne", "ClientFactureLigne", "id_facture", "id", "id", "id_article");
        print_r($clientFactureLigneEdit);
    }


    public function editFactureAllLignesOneFacture($clientFactureId)
    {

        $clientFactureLignesEdit = CoreModel::findJoin3("Article", "ClientFacture", "ClientFactureLigne", "id", $clientFactureId, "ClientFactureLigne", "ClientFacture", "Article", "ClientFactureLigne", "ClientFacture", "id_facture", "id", "id", "id_article" );
        print_r($clientFactureLignesEdit);
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
        
        $clientFactureLigne = new ClientFactureLigne;

        $clientFactureLigne->setId($id);
        $clientFactureLigne->setIdFacture($id_facture);
        $clientFactureLigne->setIdArticle($id_article);
        $clientFactureLigne->setQuantity($quantity);
        $clientFactureLigne->setCreatedAt($created_at);
        $clientFactureLigne->setUpdatedAt($updated_at);

        $success=$clientFactureLigne->insert("ClientFactureLigne","id",$id, $data);

        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }  
    }


    public function modifFactureLigne($clientFactureLigneId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $id_facture=$data["id_facture"];
        $id_article=$data["id_article"];
        $quantity=$data["quantity"];
        $created_at=$data["created_at"];

        $clientFactureLigne = new ClientFactureLigne;

        $clientFactureLigne->setIdFacture($id_facture);
        $clientFactureLigne->setIdArticle($id_article);
        $clientFactureLigne->setQuantity($quantity);
        $clientFactureLigne->setCreatedAt($created_at);
        $clientFactureLigne->setUpdatedAt(date("Y m j H i s"));
        
        $clientFactureLigne->update("ClientFactureLigne", $data, $clientFactureLigneId) ;
    }


    public function suppFactureLigne($clientFactureLigneId)
    {  
        CoreModel::delete("ClientFactureLigne","id",$clientFactureLigneId);
    }

    
    public function corsoptionFactureLigne()
    {
        CoreModel::cors();  
    }
}