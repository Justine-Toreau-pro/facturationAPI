<?php

namespace App\Controllers;

use App\Controllers\CoreController;




// Si j'ai besoin du Model Category
// use App\Models\Category;

class MainController extends CoreController
{
    /**
     * Méthode s'occupant de la page d'accueil
     *
     * @return void
     */
    public function home()
    {
        // Il faut être admin ou catalog-manager pour accéder à la home
        // $this->checkAuthorization(['admin', 'catalog-manager']);

        // On appelle la méthode show() de l'objet courant
        // En argument, on fournit le fichier de Vue
        // Par convention, chaque fichier de vue sera dans un sous-dossier du nom du Controller
        
    }
}