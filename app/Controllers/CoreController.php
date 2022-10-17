<?php

namespace App\Controllers;

use Models\CoreModel;


class CoreController
{

    public function corsoption()
    {
        CoreModel::cors();   
    }

    public function __construct()
    {
        // On vérifie les ACL
        //$this->checkAcl();

        // On vérifie le token CSRF
        $this->checkToken();
    }

    
    /**
     * Vérification du token CSRF
     */
    protected function checkToken()
    {
        // Un formulaire a-t-il été soumis ?
        if ($_SERVER['REQUEST_METHOD']) 
        {

            // On récupère le token (la valeur postée ou null)
            $token = $_SERVER['HTTP_AUTHORIZATION'] ?? null;
            //var_dump($token);
            // Idem avec le token en session
            $sessionToken = $_SESSION['token'] ?? null;
            $sessionToken = "Bearer " . $sessionToken;
            //var_dump($sessionToken);
            // 2 cas d'échéc :
            // Si le token fourni est null
            // Si le token fourni est différent du token de session
            if (empty($token) || $token != $sessionToken) 
            {
                // Alors on affiche une 403, ou on annonce une erreur dans le formulaire puis on demande de le renvoyer
                http_response_code(403);
                exit;
            }

            // Sinon tout va bien
            // On va tout de même supprimer le token en session (usage unique)
            //unset($_SESSION['token']);

            // Le programme continue sa route...
        }
    }

}
