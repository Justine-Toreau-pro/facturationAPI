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

        print_r($utilisateurEdit);
    }

    //Fonction de création d'un nouvel utilisateur
    public function newUtilisateur()
    {
        

        $jsonData = file_get_contents("php://input");

        $data = json_decode($jsonData, true);
        //var_dump($data);

        //print_r($data[identifiant]);
        
        // On récupère chaque donnée dans une variable
        $id = $data["id"];
        $identifiant = $data["identifiant"];
        $password = $data["password"];
        $entreprise = $data["entreprise"];
        $created_at = $data["created_at"];
        $updated_at = $data["updated_at"];
        //var_dump($id, $identifiant, $mot_de_passe);

        // Pas d'erreurs
        // On crée un tableau d'erreurs, qui est vide par défaut
        // on le remplira à chaque nouvelle erreur
        $errorsList = [];

        // "name" doit être présent (donc pas null, pas false, pas chaine vide)
       // if (empty($firstname)) {
            // On "push" le message dans le tableau
           // $errorsList[] = 'Le prénom est requis.';
        //}
        // et a passé le filtre de nettoyage
        // l'égalité stricte nous permet de savoir si le filtre a échoué
        //if ($firstname === false) {
          //  $errorsList[] = 'Le prénom est invalide.';
        //}

        //if (empty($lastname)) {
          //  $errorsList[] = 'Le nom est requis.';
        //}
        //if ($lastname === false) {
        //    $errorsList[] = 'Le nom est invalide.';
       // }

        //if (empty($status)) {
         //   $errorsList[] = 'Le statut est requis.';
        //}
        //if ($status === false) {
          //  $errorsList[] = 'Le statut est invalide.';
        //}


        //if (empty($teacher_id)) {
           // $errorsList[] = 'Le teacher id est requis.';
        //}
        //if ($teacher_id === false) {
            //$errorsList[] = 'Le teacher id est invalide.';
        //}

        
    

        // Y'a t-il des erreurs ? Si le tableau n'est pas vide
        //if (!empty($errorsList)) {
            // On affiche le formulaire avec les erreurs
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
            $utilisateur->setCreatedAt($created_at);
            $utilisateur->setUpdatedAt($updated_at);

            
            //var_dump($utilisateur);
            // On quitte le programme sinon on va insérer
            // la catégorie avec les erreurs (code plus bas)
           // exit;
        //}

    

        // En dernier, j'appelle la méthode du Model permettant d'ajouter en DB.
        // $success contient le retour de l'ajout true ou false
        $success=$utilisateur->insert();

        // Si succès
       if ($success) {
        echo 'sauvegarde ok.';
        DataBase::newDatabase($identifiant, $password, $entreprise);
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
        $user->setPassword('');
        $core = new Utilisateur;
        $token = $core->generateToken();
        //print_r($_SESSION);
        // Son identifiant
        //$_SESSION['userId'] = $user->getId();
        // L'objet complet ($user)
        // => cela permettra d'accéder, aux infos du User (email, role, etc.)
        // sans faire de requête à la base
        //$_SESSION['userObject'] = $user;
        $_SESSION['entreprise'] = $user->getEntreprise();
        print_r($token);
        echo "conecté en tant que" . " " . $user->getEntreprise();
        // On redirige vers la home
        //header('Location: /');
        exit;
    }


    public function logout()
    {
        // On indéfinit les clés de la session
        // qui correspondent à la connexion utilisateur
        // https://www.php.net/manual/fr/function.unset.php
        session_destroy();
        

        // On redirige vers la home
        //header('Location: /');
        exit;
    }
}