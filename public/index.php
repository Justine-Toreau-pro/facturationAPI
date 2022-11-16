<?php

// Pour afficher les erreurs avec php -S
// ini_set('display_errors', 'On');

// POINT D'ENTRÉE UNIQUE :
// FrontController

// inclusion des dépendances via Composer
// autoload.php permet de charger d'un coup toutes les dépendances installées avec composer
// mais aussi d'activer le chargement automatique des classes (convention PSR-4)
require_once '../vendor/autoload.php';
require_once '../app/Controllers/MainController.php';


// On démarre la session après l'autoload
session_start();

/* ------------
--- ROUTAGE ---
-------------*/
//var_dump($_SESSION);
//var_dump($dbPassword);
// création de l'objet router
// Cet objet va gérer les routes pour nous, et surtout il va
$router = new AltoRouter();

// le répertoire (après le nom de domaine) dans lequel on travaille est celui-ci
// Mais on pourrait travailler sans sous-répertoire
// Si il y a un sous-répertoire
if (array_key_exists('BASE_URI', $_SERVER)) {
    // Alors on définit le basePath d'AltoRouter
    $router->setBasePath($_SERVER['BASE_URI']);
    // ainsi, nos routes correspondront à l'URL, après la suite de sous-répertoire
} else { // sinon
    // On donne une valeur par défaut à $_SERVER['BASE_URI'] car c'est utilisé dans le CoreController
    $_SERVER['BASE_URI'] = '/';
}

// On doit déclarer toutes les "routes" à AltoRouter,
// afin qu'il puisse nous donner LA "route" correspondante à l'URL courante
// On appelle cela "mapper" les routes
// 1. méthode HTTP : GET ou POST (pour résumer)
// 2. La route : la portion d'URL après le basePath
// 3. Target/Cible : informations contenant
//      - le nom de la méthode à utiliser pour répondre à cette route
//      - le nom du controller contenant la méthode
// 4. Le nom de la route : pour identifier la route, on va suivre une convention
//      - "NomDuController-NomDeLaMéthode"
//      - ainsi pour la route /, méthode "home" du MainController => "main-home"


//Ne sert pas pour le moment
$router->map(
    'GET',
    '/api',
    [
        'controller' => '\App\Controllers\MainController', // On indique le FQCN de la classe
        'method' => 'home',
    ],
    'main-home'
);


// FOURNISSEUR ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'list',
        ],
        'fournisseur-list'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoption',
        ],
        'fournisseur-getcorsoption'
    );

    $router->map(
        'GET',
        '/api/fournisseur/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'edit',
        ],
        'fournisseur-edit'
    );

    $router->map(
        'POST',
        '/api/fournisseur/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'new',
        ],
        'fournisseur-new'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modif',
        ],
        'fournisseur-modif'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoption',
        ],
        'fournisseur-corsoption'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'supp',
        ],
        'fournisseur-supp'
    );


//FOURNISSEUR DEVIS ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/devis', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listDevis',
        ],
        'fournisseurDevis-listDevis'
    );

    $router->map(
        'GET',
        '/api/fournisseur/devis/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editDevis',
        ],
        'fournisseurDevis-editDevis'
    );

    $router->map(
        'POST',
        '/api/fournisseur/devis/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newDevis',
        ],
        'fournisseurDevis-newDevis'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/devis/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifDevis',
        ],
        'fournisseurDevis-modifDevis'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/devis/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionDevis',
        ],
        'fournisseurDevis-corsoptionDevis'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/devis/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppDevis',
        ],
        'fournisseurDevis-suppDevis'
    );


//FOURNISSEUR BDC ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/bdc', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listBdc',
        ],
        'fournisseurBdc-listBdc'
    );

    $router->map(
        'GET',
        '/api/fournisseur/bdc/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editBdc',
        ],
        'fournisseurBdc-editBdc'
    );

    $router->map(
        'POST',
        '/api/fournisseur/bdc/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newBdc',
        ],
        'fournisseurBdc-newBdc'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/bdc/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifBdc',
        ],
        'fournisseurBdc-modifBdc'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/bdc/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdc',
        ],
        'fournisseurBdc-corsoptionBdc'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/bdc/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppBdc',
        ],
        'fournisseurBdc-suppBdc'
    );


//FOURNISSEUR BDL ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/bdl', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listBdl',
        ],
        'fournisseurBdl-listBdl'
    );

    $router->map(
        'GET',
        '/api/fournisseur/bdl/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editBdl',
        ],
        'fournisseurBdl-editBdl'
    );

    $router->map(
        'POST',
        '/api/fournisseur/bdl/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newBdl',
        ],
        'fournisseurBdl-newBdl'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/bdl/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifBdl',
        ],
        'fournisseurBdl-modifBdl'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/bdl/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdl',
        ],
        'fournisseurBdl-corsoptionBdl'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/bdl/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppBdl',
        ],
        'fournisseurBdl-suppBdl'
    );


//FOURNISSEUR FACTURE ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/facture', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listFacture',
        ],
        'fournisseurFacture-listFacture'
    );

    $router->map(
        'GET',
        '/api/fournisseur/facture/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editFacture',
        ],
        'fournisseurFacture-editFacture'
    );

    $router->map(
        'POST',
        '/api/fournisseur/facture/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newFacture',
        ],
        'fournisseurFacture-newFacture'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/facture/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifFacture',
        ],
        'fournisseurFacture-modifFacture'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/facture/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionFacture',
        ],
        'fournisseurFacture-corsoptionFacture'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/facture/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppFacture',
        ],
        'fournisseurFacture-suppFacture'
    );


//FOURNISSEUR DEVIS LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/devis/ligne', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listDevisLigne',
        ],
        'fournisseurDevisLigne-listDevisLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/devis/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editDevisLigne',
        ],
        'fournisseurDevisLigne-editDevisLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/one/devis/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editDevisAllLignesOneDevis',
        ],
        'fournisseurOneDevisLignes-editDevisAllLignesOneDevis'
    );

    $router->map(
        'POST',
        '/api/fournisseur/devis/ligne/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newDevisLigne',
        ],
        'fournisseurDevisLigne-newDevisLigne'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/devis/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifDevisLigne',
        ],
        'fournisseurDevisLigne-modifDevisLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/devis/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionDevisLigne',
        ],
        'fournisseurDevisLigne-corsoptionDevisLigne'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/devis/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppDevisLigne',
        ],
        'fournisseurDevisLigne-suppDevisLigne'
    );


//FOURNISSEUR BDC LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/bdc/ligne', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listBdcLigne',
        ],
        'fournisseurBdcLigne-listBdcLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/bdc/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editBdcLigne',
        ],
        'fournisseurBdcLigne-editBdcLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/one/bdc/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editBdcAllLignesOneBdc',
        ],
        'fournisseurOneBdcLignes-editBdcAllLignesOneBdc'
    );

    $router->map(
        'POST',
        '/api/fournisseur/bdc/ligne/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newBdcLigne',
        ],
        'fournisseurBdcLigne-newBdcLigne'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/bdc/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifBdcLigne',
        ],
        'fournisseurBdcLigne-modifBdcLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/bdc/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdcLigne',
        ],
        'fournisseurBdcLigne-corsoptionBdcLigne'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/bdc/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppBdcLigne',
        ],
        'fournisseurBdcLigne-suppBdcLigne'
    );


//FOURNISSEUR BDL LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/bdl/ligne', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listBdlLigne',
        ],
        'fournisseurBdlLigne-listBdlLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/bdl/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editBdlLigne',
        ],
        'fournisseurBdlLigne-editBdlLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/one/bdl/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editBdlAllLignesOneBdl',
        ],
        'fournisseurOneBdlLignes-editBdlAllLignesOneBdl'
    );

    $router->map(
        'POST',
        '/api/fournisseur/bdl/ligne/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newBdlLigne',
        ],
        'fournisseurBdlLigne-newBdlLigne'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/bdl/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifBdlLigne',
        ],
        'fournisseurBdlLigne-modifBdlLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/bdl/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdlLigne',
        ],
        'fournisseurBdlLigne-corsoptionBdlLigne'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/bdl/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppBdlLigne',
        ],
        'fournisseurBdlLigne-suppBdlLigne'
    );


//FOURNISSEUR FACTURE LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/fournisseur/facture/ligne', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'listFactureLigne',
        ],
        'fournisseurFactureLigne-listFactureLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/facture/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editFactureLigne',
        ],
        'fournisseurFactureLigne-editFactureLigne'
    );

    $router->map(
        'GET',
        '/api/fournisseur/one/facture/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'editFactureAllLignesOneFacture',
        ],
        'fournisseurOneFactureLignes-editFactureAllLignesOneFacture'
    );

    $router->map(
        'POST',
        '/api/fournisseur/facture/ligne/new', 
        [
            'controller' => '\App\Controllers\FournisseurController',
            'method' => 'newFactureLigne',
        ],
        'fournisseurFactureLigne-newFactureLigne'
    );

    $router->map(
        'PUT',
        '/api/fournisseur/facture/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'modifFactureLigne',
        ],
        'fournisseurFactureLigne-modifFactureLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/fournisseur/facture/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', // On indique le FQCN de la classe
            'method' => 'corsoptionFactureLigne',
        ],
        'fournisseurFactureLigne-corsoptionFactureLigne'
    );

    $router->map(
        'DELETE',
        '/api/fournisseur/facture/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\FournisseurController', 
            'method' => 'suppFactureLigne',
        ],
        'fournisseurFactureLigne-suppFactureLigne'
    );




//CLIENT ENDPOINT
    $router->map(
        'GET',
        '/api/client',  
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'list',
        ],
        'client-list'
    );

    $router->map(
        'GET',
        '/api/client/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'edit',
        ],
        'client-edit'
    );
    $router->map(
        'POST',
        '/api/client/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'new',
        ],
        'client-new'
    );

    $router->map(
        'PUT',
        '/api/client/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modif',
        ],
        'client-modif'
    );

    $router->map(
        'OPTIONS',
        '/api/client/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoption',
        ],
        'client-corsoption'
    );

    $router->map(
        'DELETE',
        '/api/client/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'supp',
        ],
        'client-supp'
    );


//CLIENT DEVIS ENDPOINT
    $router->map(
        'GET',
        '/api/client/devis', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listDevis',
        ],
        'clientDevis-listDevis'
    );

    $router->map(
        'GET',
        '/api/client/devis/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editDevis',
        ],
        'clientDevis-editDevis'
    );

    $router->map(
        'POST',
        '/api/client/devis/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newDevis',
        ],
        'clientDevis-newDevis'
    );

    $router->map(
        'PUT',
        '/api/client/devis/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifDevis',
        ],
        'clientDevis-modifDevis'
    );

    $router->map(
        'OPTIONS',
        '/api/client/devis/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionDevis',
        ],
        'clientDevis-corsoptionDevis'
    );

    $router->map(
        'DELETE',
        '/api/client/devis/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppDevis',
        ],
        'clientDevis-suppDevis'
    );


//CLIENT BDC ENDPOINT
    $router->map(
        'GET',
        '/api/client/bdc', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listBdc',
        ],
        'clientBdc-listBdc'
    );

    $router->map(
        'GET',
        '/api/client/bdc/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editBdc',
        ],
        'clientBdc-editBdc'
    );

    $router->map(
        'POST',
        '/api/client/bdc/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newBdc',
        ],
        'clientBdc-newBdc'
    );

    $router->map(
        'PUT',
        '/api/client/bdc/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifBdc',
        ],
        'clientBdc-modifBdc'
    );

    $router->map(
        'OPTIONS',
        '/api/client/bdc/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdc',
        ],
        'clientBdc-corsoptionBdc'
    );

    $router->map(
        'DELETE',
        '/api/client/bdc/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppBdc',
        ],
        'clientBdc-suppBdc'
    );


//CLIENT BDL ENDPOINT
    $router->map(
        'GET',
        '/api/client/bdl', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listBdl',
        ],
        'clientBdl-listBdl'
    );

    $router->map(
        'GET',
        '/api/client/bdl/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editBdl',
        ],
        'clientBdl-editBdl'
    );

    $router->map(
        'POST',
        '/api/client/bdl/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newBdl',
        ],
        'clientBdl-newBdl'
    );

    $router->map(
        'PUT',
        '/api/client/bdl/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifBdl',
        ],
        'clientBdl-modifBdl'
    );

    $router->map(
        'OPTIONS',
        '/api/client/bdl/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdl',
        ],
        'clientBdl-corsoptionBdl'
    );

    $router->map(
        'DELETE',
        '/api/client/bdl/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppBdl',
        ],
        'clientBdl-suppBdl'
    );


//CLIENT FACTURE ENDPOINT
    $router->map(
        'GET',
        '/api/client/facture', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listFacture',
        ],
        'clientFacture-listFacture'
    );

    $router->map(
        'GET',
        '/api/client/facture/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editFacture',
        ],
        'clientFacture-editFacture'
    );

    $router->map(
        'POST',
        '/api/client/facture/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newFacture',
        ],
        'clientFacture-newFacture'
    );

    $router->map(
        'PUT',
        '/api/client/facture/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifFacture',
        ],
        'clientFacture-modifFacture'
    );

    $router->map(
        'OPTIONS',
        '/api/client/facture/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionFacture',
        ],
        'clientFacture-corsoptionFacture'
    );

    $router->map(
        'DELETE',
        '/api/client/facture/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppFacture',
        ],
        'clientFacture-suppFacture'
    );



//CLIENT DEVIS LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/client/devis/ligne', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listDevisLigne',
        ],
        'clientDevisLigne-listDevisLigne'
    );

    $router->map(
        'GET',
        '/api/client/devis/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editDevisLigne',
        ],
        'clientDevisLigne-editDevisLigne'
    );

    $router->map(
        'GET',
        '/api/client/one/devis/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editDevisAllLignesOneDevis',
        ],
        'clientOneDevisLignes-editDevisAllLignesOneDevis'
    );

    $router->map(
        'POST',
        '/api/client/devis/ligne/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newDevisLigne',
        ],
        'clientDevisLigne-newDevisLigne'
    );

    $router->map(
        'PUT',
        '/api/client/devis/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifDevisLigne',
        ],
        'clientDevisLigne-modifDevisLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/client/devis/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionDevisLigne',
        ],
        'clientDevisLigne-corsoptionDevisLigne'
    );

    $router->map(
        'DELETE',
        '/api/client/devis/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppDevisLigne',
        ],
        'clientDevisLigne-suppDevisLigne'
    );


//CLIENT BDC LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/client/bdc/ligne', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listBdcLigne',
        ],
        'clientBdcLigne-listBdcLigne'
    );

    $router->map(
        'GET',
        '/api/client/bdc/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editBdcLigne',
        ],
        'clientBdcLigne-editBdcLigne'
    );

    $router->map(
        'GET',
        '/api/client/one/bdc/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editBdcAllLignesOneBdc',
        ],
        'clientOneBdcLignes-editBdcAllLignesOneBdc'
    );

    $router->map(
        'POST',
        '/api/client/bdc/ligne/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newBdcLigne',
        ],
        'clientBdcLigne-newBdcLigne'
    );

    $router->map(
        'PUT',
        '/api/client/bdc/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifBdcLigne',
        ],
        'clientBdcLigne-modifBdcLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/client/bdc/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdcLigne',
        ],
        'clientBdcLigne-corsoptionBdcLigne'
    );

    $router->map(
        'DELETE',
        '/api/client/bdc/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppBdcLigne',
        ],
        'clientBdcLigne-suppBdcLigne'
    );


//CLIENT BDL LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/client/bdl/ligne', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listBdlLigne',
        ],
        'clientBdlLigne-listBdlLigne'
    );

    $router->map(
        'GET',
        '/api/client/bdl/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editBdlLigne',
        ],
        'clientBdlLigne-editBdlLigne'
    );

    $router->map(
        'GET',
        '/api/client/one/bdl/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editBdlAllLignesOneBdl',
        ],
        'clientOneBdlLignes-editBdlAllLignesOneBdl'
    );

    $router->map(
        'POST',
        '/api/client/bdl/ligne/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newBdlLigne',
        ],
        'clientBdlLigne-newBdlLigne'
    );

    $router->map(
        'PUT',
        '/api/client/bdl/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifBdlLigne',
        ],
        'clientBdlLigne-modifBdlLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/client/bdl/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionBdlLigne',
        ],
        'clientBdlLigne-corsoptionBdlLigne'
    );

    $router->map(
        'DELETE',
        '/api/client/bdl/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppBdlLigne',
        ],
        'clientBdlLigne-suppBdlLigne'
    );


//CLIENT FACTURE LIGNE ENDPOINT
    $router->map(
        'GET',
        '/api/client/facture/ligne', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'listFactureLigne',
        ],
        'clientFactureLigne-listFactureLigne'
    );

    $router->map(
        'GET',
        '/api/client/facture/ligne/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editFactureLigne',
        ],
        'clientFactureLigne-editFactureLigne'
    );

    $router->map(
        'GET',
        '/api/client/one/facture/lignes/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'editFactureAllLignesOneFacture',
        ],
        'clientOneFactureLignes-editFactureAllLignesOneFacture'
    );

    $router->map(
        'POST',
        '/api/client/facture/ligne/new', 
        [
            'controller' => '\App\Controllers\ClientController',
            'method' => 'newFactureLigne',
        ],
        'clientFactureLigne-newFactureLigne'
    );

    $router->map(
        'PUT',
        '/api/client/facture/ligne/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'modifFactureLigne',
        ],
        'clientFactureLigne-modifFactureLigne'
    );

    $router->map(
        'OPTIONS',
        '/api/client/facture/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', // On indique le FQCN de la classe
            'method' => 'corsoptionFactureLigne',
        ],
        'clientFactureLigne-corsoptionFactureLigne'
    );

    $router->map(
        'DELETE',
        '/api/client/facture/ligne/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ClientController', 
            'method' => 'suppFactureLigne',
        ],
        'clientFactureLigne-suppFactureLigne'
    );






//ARTICLE ENDPOINT
    $router->map(
        'GET',
        '/api/article', 
        [
            'controller' => '\App\Controllers\ArticleController',
            'method' => 'list',
        ],
        'article-list'
    );

    $router->map(
        'GET',
        '/api/article/[i:index]',
        [
            'controller' => '\App\Controllers\ArticleController', 
            'method' => 'edit',
        ],
        'article-edit'
    );

    $router->map(
        'POST',
        '/api/article/new', 
        [
            'controller' => '\App\Controllers\ArticleController',
            'method' => 'new',
        ],
        'article-new'
    );

    $router->map(
        'PUT',
        '/api/article/modif/[i:index]',
        [
            'controller' => '\App\Controllers\ArticleController', 
            'method' => 'modif',
        ],
        'article-modif'
    );

    $router->map(
        'OPTIONS',
        '/api/article/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ArticleController', // On indique le FQCN de la classe
            'method' => 'corsoption',
        ],
        'article-corsoption'
    );

    $router->map(
        'DELETE',
        '/api/article/supp/[i:index]',
        [
            'controller' => '\App\Controllers\ArticleController', 
            'method' => 'supp',
        ],
        'article-supp'
    );




//PROSPECT ENDPOINT

$router->map(
    'GET',
    '/api/prospect', 
    [
        'controller' => '\App\Controllers\ProspectController',
        'method' => 'list',
    ],
    'prospect-list'
);

$router->map(
    'GET',
    '/api/prospect/[i:index]',
    [
        'controller' => '\App\Controllers\ProspectController', // On indique le FQCN de la classe
        'method' => 'edit',
    ],
    'prospect-edit'
);

$router->map(
    'POST',
    '/api/prospect/new', 
    [
        'controller' => '\App\Controllers\ProspectController',
        'method' => 'new',
    ],
    'prospect-new'
);

$router->map(
    'PUT',
    '/api/prospect/modif/[i:index]',
    [
        'controller' => '\App\Controllers\ProspectController', 
        'method' => 'modif',
    ],
    'prospect-modif'
);

$router->map(
    'OPTIONS',
    '/api/prospect/supp/[i:index]',
    [
        'controller' => '\App\Controllers\ProspectController', // On indique le FQCN de la classe
        'method' => 'corsoption',
    ],
    'prospect-corsoption'
);

$router->map(
    'DELETE',
    '/api/prospect/supp/[i:index]',
    [
        'controller' => '\App\Controllers\ProspectController', 
        'method' => 'supp',
    ],
    'prospect-supp'
);








//UTILISATEUR ENDPOINT

$router->map(
    'GET',
    '/api/utilisateur', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'list',
    ],
    'utilisateur-list'
);

$router->map(
    'GET',
    '/api/utilisateur/[i:index]', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'edit',
    ],
    'utilisateur-edit'
);

$router->map(
    'POST',
    '/api/utilisateur/new', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'newUtilisateur',
    ],
    'utilisateur-newUtilisateur'
);

$router->map(
    'PUT',
    '/api/utilisateur/modif/[i:index]', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'modifUtilisateur',
    ],
    'utilisateur-modifUtilisateur'
);

$router->map(
    'OPTIONS',
    '/api/utilisateur/supp/[i:index]',
    [
        'controller' => '\App\Controllers\UtilisateurController', // On indique le FQCN de la classe
        'method' => 'corsoption',
    ],
    'utilisateur-corsoption'
);

$router->map(
    'DELETE',
    '/api/utilisateur/supp/[i:index]', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'suppUtilisateur',
    ],
    'utilisateur-suppUtilisateur'
);

$router->map(
    'POST',
    '/api/utilisateur/login', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'connexionUtilisateur',
    ],
    'utilisateur-connexionUtilisateur'
);

$router->map(
    'POST',
    '/api/utilisateur/logout', //url ou endpoint 
    [
        'controller' => '\App\Controllers\UtilisateurController',
        'method' => 'logout',
    ],
    'utilisateur-logout'
);

$router->map(
    'GET',
    '/api/database', //url ou endpoint 
    [
        'controller' => '\App\Controllers\DataBaseController',
        'method' => 'create',
    ],
    
);





/* -------------
--- DISPATCH ---
--------------*/

// On demande à AltoRouter de trouver une route qui correspond à l'URL courante
$match = $router->match();

// Ensuite, pour dispatcher le code dans la bonne méthode, du bon Controller
// On délègue à une librairie externe : https://packagist.org/packages/benoclock/alto-dispatcher
// 1er argument : la variable $match retournée par AltoRouter
// 2e argument : le "target" (controller & méthode) pour afficher la page 404
$dispatcher = new Dispatcher($match, '\App\Controllers\ErrorController::err404');
// Une fois le "dispatcher" configuré, on lance le dispatch qui va exécuter la méthode du controller
$dispatcher->dispatch();