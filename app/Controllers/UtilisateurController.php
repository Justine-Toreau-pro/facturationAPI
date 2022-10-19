<?php

namespace App\Controllers;

use App\Models\Utilisateur;
use App\Models\CoreModel;
use App\Models\DataBase;

use App\Controllers\CoreController;



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


    //Fonction de connexion
    public function connexionUtilisateur()
    {
        //on récupère les valeurs envoyées par le front
        $jsonData = file_get_contents("php://input");
        $data = json_decode($jsonData, true);
        
        //On les stock dans des variables
    
        $identifiant = $data["identifiant"];
        $password = $data["password"];
        //$password = password_hash($data["password"], PASSWORD_DEFAULT);
        //$entreprise = $data["entreprise"];
        
        //print_r($identifiant);
        //print_r($password);
        // On va chercher l'utilisateur demandé
        $user = Utilisateur::find("Utilisateur", "identifiant", $identifiant);
        
        //print_r($user);
        //print_r(json_decode($user));
        //$user = json_decode($user);
        //$user = json_decode($user);
        //$user=json_decode($user);
        
        // Le user existe-t-il ?
        //print_r($user);
        
        if ($user === false) {
            // On sait que c'est juste l'email qui est inconnu
            // mais on ne le dit pas (on donne le moins d'infos possible)

            // @todo : réafficher le form avec des erreurs en HTML
            echo 'Utilisateur ou mot de passe incorrect. (debug: email)';
            
            // return permet de sortir de la méthode sans exécuter la suite du code
            return;
        }
        
        // Le mot de passe est-il correct ?
        // Si le mot de passe fourni via $_POST ne correspond pas au mot de passe du User en BDD
        // c'est que le couple email/password est incorrect
        // On utilise la fonction native de PHP password_verify()
        // https://www.php.net/manual/en/function.password-verify
        if (password_verify($password, $user->getPassword()) === false) {
            // @todo : réafficher le form avec des erreurs en HTML
            echo 'Utilisateur ou mot de passe incorrect. (debug: password)';

            // return permet de sortir de la méthode sans exécuter la suite du code
            return;
        }

        // Si tout est correct, on faut ce qu'on a à faire
        // On renseigne des infos en session, pour identifier l'utilisateur

        // Sécurité supplémentaire : passer le mot de passe à null (plus secure)
        // avant de stocker le user session
        //$user->setPassword('');
        $core = new Utilisateur;
        $token = $core->generateToken();
        $_SESSION['entreprise'] = $user->getEntreprise();
        $_SESSION['identifiant'] = $user->getIdentifiant();
        $_SESSION['password'] = $core->cryptage($data["password"]);
        
        var_dump($_SESSION);
        
        echo "conecté en tant que" . " " . $user->getEntreprise();
        // On redirige vers la home
        //header('Location: /');
        exit;
    }


    public function logout()
    {
        
        session_destroy();
        // On redirige vers la home
        //header('Location: /');
        exit;
    }
}