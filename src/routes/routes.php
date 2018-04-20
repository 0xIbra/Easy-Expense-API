<?php
/**
 * Created by PhpStorm.
 * User: ibragim.abubakarov
 * Date: 20/04/2018
 * Time: 20:11
 */


// Affichage de tous les utilisateurs

$app->get("/api/utilisateurs", function(\Psr\Http\Message\RequestInterface $request, \Psr\Http\Message\ResponseInterface $response){
    $uManager = new \Src\Model\UtilisateurManager();
    $json = $uManager->getCustomers();
    $request->getHeader("content-type:application/json");
    $response->getBody()->write($json);
});