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
 * Route pour chercher les notes de frais d'un utilisateur avec son id
 */
$app->get("/api/notesdefrais/get/{idU}", function(Request $request, Response $response){
    $id = $request->getAttribute("idU");
    $nManager = new \Src\Model\NoteDeFraisManager();
    $json = $nManager->getNotesFraisForUser($id);
    return $response->getBody()->write($json);
});

/**
 * Route pour récupérer tous les depense d'une note de frais
 */
$app->get("/api/depenses/get/{codeFrais}", function (Request $request, Response $response){
   $codeFrais = $request->getAttribute("codeFrais");
   $dManager = new \Src\Model\DepenseManager();
   $json = $dManager->getDepensesForNote($codeFrais);
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
    $data = $request->getParsedBody();
    $noteF = new \Src\Model\NoteDeFrais($data);
    $nManager = new \Src\Model\NoteDeFraisManager();
    $json = $nManager->post($noteF);
    $response->getBody()->write($json);
    return $response;
});

// ---------HTTP POST-----------

#-------------------------------

// ---------HTTP PUT------------

/**
 * Permet de modifier un Utilisateur.
 * Cette route attend un Objet JSON et il le parse en Objet PHP.
 */
$app->put('/api/utilisateur/put', function(Request $request, Response $response){
    $decodedJson = $request->getParsedBody();
    $User = new \Src\Model\Utilisateur($decodedJson);
    $uManager = new \Src\Model\UtilisateurManager();
    $res = $uManager->put($User);

    $obj = new stdClass();
    $obj->update = $res;
    return $response->getBody()->write(json_encode($obj));
});


// ---------HTTP PUT------------


#-------------------------------


// ---------HTTP DELETE---------





// ---------HTTP DELETE---------