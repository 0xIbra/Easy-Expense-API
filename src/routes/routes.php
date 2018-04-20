<?php
/**
 * Created by PhpStorm.
 * User: ibragim.abubakarov
 * Date: 20/04/2018
 * Time: 20:11
 */



$app->get("/api/utilisateurs", function(Request $request, Response $response){
    $uManager = new \Src\Model\UtilisateurManager();
    

});