<?php

namespace App\Controllers;

use App\Models\CoreModel;
use App\Models\Prospect;

use App\Controllers\CoreController;


class ProspectController extends CoreController
{

//PROSPECT    
    public function list()
    {
        
        $prospectList = CoreModel::findAll("Prospect");
        print_r($prospectList);
    }


    public function edit($prospectId)
    {
        $prospectEdit = CoreModel::find("Prospect","id", $prospectId);
        print_r($prospectEdit);
    }


    public function new()
    {
        

        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
     
        $id = $data["id"];
        $numero_prospect=$data["numero_prospect"];
        $type_de_prospect=$data["type_de_prospect"];
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
        
        $prospect = new Prospect;

        $prospect->setId($id);
        $prospect->setNumeroProspect($numero_prospect);
        $prospect->setTypeDeProspect($type_de_prospect);
        $prospect->setTypeDeSociete($type_de_societe);
        $prospect->setRaisonSociale($raison_sociale);
        $prospect->setAdresseNumero($adresse_numero);
        $prospect->setAdresseBisTer($adresse_bis_ter);
        $prospect->setAdresseTypeDeVoie($adresse_type_de_voie);
        $prospect->setAdresseNomDeLaVoie($adresse_nom_de_la_voie);
        $prospect->setAdresseCp($adresse_cp);
        $prospect->setAdresseVille($adresse_ville);
        $prospect->setAdressePays($adresse_pays);
        $prospect->setTelephone($telephone);
        $prospect->setMail($mail);
        $prospect->setSiteWeb($site_web);
        $prospect->setNumeroSiret($numero_siret);
        $prospect->setNumeroSiren($numero_siren);
        $prospect->setNumeroTva($numero_tva);
        $prospect->setCreatedAt($created_at);
        $prospect->setUpdatedAt($updated_at);
        
       
        $success=$prospect->insert("Prospect","id",$id, $data);

    
        if ($success) 
        {
            echo 'sauvegarde ok.';
        } 
        else 
        {
            echo 'Erreur à la sauvegarde.';
        }
    }


    public function modif($prospectId)
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);

        $numero_prospect=$data["numero_prospect"];
        $type_de_prospect=$data["type_de_prospect"];
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
                
        $prospect = new Prospect;

        $prospect->setNumeroProspect($numero_prospect);
        $prospect->setTypeDeProspect($type_de_prospect);
        $prospect->setTypeDeSociete($type_de_societe);
        $prospect->setRaisonSociale($raison_sociale);
        $prospect->setAdresseNumero($adresse_numero);
        $prospect->setAdresseBisTer($adresse_bis_ter);
        $prospect->setAdresseTypeDeVoie($adresse_type_de_voie);
        $prospect->setAdresseNomDeLaVoie($adresse_nom_de_la_voie);
        $prospect->setAdresseCp($adresse_cp);
        $prospect->setAdresseVille($adresse_ville);
        $prospect->setAdressePays($adresse_pays);
        $prospect->setTelephone($telephone);
        $prospect->setMail($mail);
        $prospect->setSiteWeb($site_web);
        $prospect->setNumeroSiret($numero_siret);
        $prospect->setNumeroSiren($numero_siren);
        $prospect->setNumeroTva($numero_tva);
        $prospect->setCreatedAt($created_at);
        $prospect->setUpdatedAt(date("Y m j H i s"));
        
        $success=$prospect->update("Prospect", $data, $prospectId);
        
    }


    public function supp($prospectId)
    {
        CoreModel::delete("Prospect","id",$prospectId);
    }

    
    public function corsoption()
    {
        CoreModel::cors();
    }
}