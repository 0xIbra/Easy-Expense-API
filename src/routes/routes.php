<?php
/**
 * Created by PhpStorm.
 * User: ibragim.abubakarov
 * Date: 20/04/2018
 * Time: 20:11
 */

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;


// ---------HTTP GET---------


/**
 * Affichage de tous les utilisateurs
 */
$app->get("/api/utilisateurs", function(Request $request, Response $response){
    $uManager = new \Src\Model\UtilisateurManager();
    $json = $uManager->getCustomers();
    $response->getBody()->write($json);
});


/**
 * Affichage de tous les notes de frais
 */
$app->get("/api/notesdefrais", function (Request $request, Response $response){
    $nManagaer = new \Src\Model\NoteDeFraisManager();
    $json = $nManagaer->getNotesFrais();
    $response->getBody()->write($json);
    return $response;
});


/**
 * Authentification simple
 * @return type Response
 */
$app->get("/api/utilisateur/auth/{email}/{password}", function (Request $request, Response $response){
    $mail = $request->getAttribute("email");
    $pass = $request->getAttribute("password");

    $uManager = new \Src\Model\UtilisateurManager();
    $json = $uManager->Authentification($mail, $pass);
    $response->getBody()->write($json);
    return $response;
});

// ---------HTTP GET---------



#-------------------------------



// ---------HTTP POST---------

/**
 * Permet d'ajouter une note de frais et ensuite retourne la note de frais ajoutée avec tous ses champs en JSON
 * @return type JSON
 */
$app->post("/api/notesdefrais/add", function(Request $request, Response $response){
    $libelle = $request->getParam('libelleNote');
    $idU = $request->getParam('idUtilisateur');

    $nManager = new \Src\Model\NoteDeFraisManager();
    $json = $nManager->post($libelle, $idU);
    $response->getBody()->write($json);
    return $json;
});

// ---------HTTP POST-----------

#-------------------------------

// ---------HTTP PUT------------




// ---------HTTP PUT------------


#-------------------------------


// ---------HTTP DELETE---------





// ---------HTTP DELETE---------