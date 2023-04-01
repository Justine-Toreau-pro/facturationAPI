<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\CoreModel;
use App\Models\DataBase;

use App\Controllers\CoreController;
use App\Controllers\SecurityController;


class UtilisateurController //extends CoreController
{
    public function list()
    {
        // On va chercher les données
        // :: => opérateur de résolution de portée
        $utilisateurList = Utilisateur::findAll("Utilisateur", "Utilisateur");
        return print_r($utilisateurList);
    }


    public function edit($utilisateurId)
    {
        // On récupère l'id transmis par AltoDispatcher
        // comme argument "direct" (plus de tableau)
        $utilisateurEdit = Utilisateur::find("Utilisateur", "id", $utilisateurId);

        return print_r($utilisateurEdit);
    }


    //Fonction de création d'un nouvel utilisateur
    public function newUtilisateur()
    {
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        
        $id = $data["id"];
        $identifiant = $data["identifiant"]; //ADRESSE MAIL
        $password = $data["password"];
        $password_control = $data["password_control"];
        $entreprise = $data["entreprise"];
        $type_de_societe = $data["type_de_societe"];
        $raison_sociale = $data["raison_sociale"];
        $adresse_numero = $data["adresse_numero"];
        $adresse_bis_ter = $data["adresse_bis_ter"];
        $adresse_type_de_voie = $data["adresse_type_de_voie"];
        $adresse_nom_de_la_voie = $data["adresse_nom_de_la_voie"];
        $adresse_cp = $data["adresse_cp"];
        $adresse_ville = $data["adresse_ville"];
        $adresse_pays = $data["adresse_pays"];
        $telephone = $data["telephone"];
        $mail = $data["mail"];
        $site_web = $data["site_web"];
        $numero_siret = $data["numero_siret"];
        $numero_siren = $data["numero_siren"];
        $numero_tva = $data["numero_tva"];
        $role = $data["role"];
        $code_mail_validate = SecurityController::codeGenerate();
        $date_de_validite_paiement = $data["date_de_validite_paiement"];
        $created_at = $data["created_at"];
        $updated_at = $data["updated_at"];
        

        // Pas d'erreurs
        // On crée un tableau d'erreurs, qui est vide par défaut
        // on le remplira à chaque nouvelle erreur
        $errorsList = [];

        // "identifiant" doit être présent (donc pas null)
        if (empty($identifiant) || $identifiant == "") 
        {
            // On "push" le message dans le tableau
           $errorsList[] = "L'adresse mail est requise.";
        }

        // "password" doit être présent (donc pas null)
        if (empty($password)) 
        {
            // On "push" le message dans le tableau
           $errorsList[] = "Le mot de passe est requis.";
        }

        // "password" doit être présent (donc pas null)
        if (empty($password_control)) 
        {
            // On "push" le message dans le tableau
           $errorsList[] = "Le mot de passe de vérification est requis.";
        }

        //password et password_control doivent être identiques
        if ($password != $password_control) 
        {
            // On "push" le message dans le tableau
           $errorsList[] = "Les mots de passe ne sont pas identiques.";
        }

        //password doit être conforme aux règles utilisateur de mysql
        if (strlen($password) < 8) 
        {
            // On "push" le message dans le tableau
           $errorsList[] = "Le mot de passe fait moins de 8 caractères";
        }

        if (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#', $password)) 
        {

        }
        else 
        {
     
            $errorsList[] = "Le mot de passe n'est pas conforme. Il doit contenir au moins 8 caractères dont une majuscule, une minuscule, un chiffre et un caractère spécial tel que: . ! & @ §";
        }
    

        // Y'a t-il des erreurs ? Si le tableau n'est pas vide
        if (!empty($errorsList)) 
        {
            return print_r(json_encode($errorsList));
        }
        else
        {
            
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Pour insérer en DB, ou afficher le formulaire pré-saisi
            // je crée d'abord une nouvelle instance du Model correspondant
            $utilisateur = new Utilisateur;
            //var_dump($utilisateur);
            // Puis je renseigne les valeurs pour chaque propriété correspondante dans l'instance.
            // On remet ce que l'utilisateur a saisi (POST)
            $utilisateur->setId($id);
            $utilisateur->setIdentifiant($identifiant);
            $utilisateur->setPassword($hashedPassword);
            $utilisateur->setEntreprise($entreprise);
            $utilisateur->setTypeDeSociete($type_de_societe);
            $utilisateur->setRaisonSociale($raison_sociale);
            $utilisateur->setAdresseNumero($adresse_numero);
            $utilisateur->setAdresseBisTer($adresse_bis_ter);
            $utilisateur->setAdresseTypeDeVoie($adresse_type_de_voie);
            $utilisateur->setAdresseNomDeLaVoie($adresse_nom_de_la_voie);
            $utilisateur->setAdresseCP($adresse_cp);
            $utilisateur->setAdresseVille($adresse_ville);
            $utilisateur->setAdressePays($adresse_pays);
            $utilisateur->setTelephone($telephone);
            $utilisateur->setMail($mail);
            $utilisateur->setSiteWeb($site_web);
            $utilisateur->setNumeroSiret($numero_siret);
            $utilisateur->setNumeroSiren($numero_siren);
            $utilisateur->setNumeroTva($numero_tva);
            $utilisateur->setRole($role);
            $utilisateur->setCodeMailValidate($code_mail_validate);
            $utilisateur->setMailValidate(0);
            $utilisateur->setDateDeValiditePaiement($date_de_validite_paiement);
            $utilisateur->setCreatedAt($created_at);
            $utilisateur->setUpdatedAt($updated_at);

            
                // En dernier, j'appelle la méthode du Model permettant d'ajouter en DB.
            // $success contient le retour de l'ajout true ou false
            $success=$utilisateur->insert();

            // Si succès
        if ($success) {
            echo 'sauvegarde ok.';
            DataBase::newDatabase($identifiant, $password, $identifiant);
            $result = SecurityController::mailValidate($identifiant);
            var_dump($result);
                // Ne pas faire de echo ou de dump avant header() !

                // On redirige vers la liste
                // Ajout d'un en-tête de réponse HTTP
                // qui fera office de redirection (et aura un statut 302)
            //header('Location: /students');
                // On stoppe le programme ici pour ne rien éxécuter de superflu
            // exit;
            } else {
                // Sinon
            echo 'Erreur à la sauvegarde.';
            }
                //var_dump($utilisateur);
                // On quitte le programme sinon on va insérer
                // la catégorie avec les erreurs (code plus bas)
                
        }
    }


    public function modifUtilisateur()
    {
        echo "par ici";
    }


    public function suppUtilisateur()
    {
        echo "supp ulilisateur";
    }


    public static function corsoption()
    {
            // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
        header('Access-Control-Allow-Origin : *');
    }
    
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS, DELETE");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        exit(0);
    }
}


    //Fonction de connexion
    public function connexionUtilisateur()
    {
        UtilisateurController::corsoption();
        //on récupère les valeurs envoyées par le front
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        
        //On les stock dans des variables
        $identifiant = $data["identifiant"];
        $password = $data["password"];
        
        $user = Utilisateur::find("Utilisateur", "identifiant", $identifiant);
        
        if ($user === false) 
        {
            // On sait que c'est juste l'email qui est inconnu
            // mais on ne le dit pas (on donne le moins d'infos possible)

            echo 'Utilisateur ou mot de passe incorrect. (debug: email)';
            
            // return permet de sortir de la méthode sans exécuter la suite du code
            return;
        }
        
        if (password_verify($password, $user->getPassword()) === false) 
        {
            // @todo : réafficher le form avec des erreurs en HTML
            echo 'Utilisateur ou mot de passe incorrect. (debug: password)';

            // return permet de sortir de la méthode sans exécuter la suite du code
            return;
        }

        SecurityController::generateToken();
        
        $_SESSION['identifiant'] = $user->getIdentifiant();
        $_SESSION['password'] = SecurityController::cryptage($data["password"]);
        $_SESSION['entreprise'] = $user->getEntreprise();
        $_SESSION['adresse_numero'] = $user->getAdresseNumero();
        $_SESSION['adresse_bis_ter'] = $user->getAdresseBisTer();
        $_SESSION['adresse_type_de_voie'] = $user->getAdresseTypeDeVoie();
        $_SESSION['adresse_nom_de_la_voie'] = $user->getAdresseNomDeLaVoie();
        $_SESSION['adresse_cp'] = $user->getAdresseCp();
        $_SESSION['adresse_ville'] = $user->getAdresseVille();
        $_SESSION['telephone'] = $user->getTelephone();
        $_SESSION['numero_siret'] = $user->getNumeroSiret();
        $_SESSION['numero_tva'] = $user->getNumeroTva();
        //var_dump($_SESSION);
        
        return print_r(json_encode($_SESSION)) ;
        //$jsonResponse = json_encode($response);
        //return $jsonResponse;
        // On redirige vers la home
        //header('Location: /');
        exit;
    }


    public function logout()
    {
        UtilisateurController::corsoption();
        session_destroy();
        // On redirige vers la home
        //header('Location: /');
        //return print_r(json_encode($_SESSION)) ;
        echo 'deconnecter';
    }

}