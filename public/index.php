<?php
/**
 * Created by PhpStorm.
 * User: ibragim.abubakarov
 * Date: 20/04/2018
 * Time: 19:35
 */

use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

require '../vendor/autoload.php';

$app = new \Slim\App;

require '../src/routes/routes.php';

/**
 * Route principale
 */
$app->get("/", function(Request $request, Response $response){
    $html = file_get_contents("../src/views/base.html");
    $html = str_replace('{{TITRE}}', "Easy Expense - REST API", $html);
    $html = str_replace("{{STYLEPATH}}", 'css/main.css', $html);
    $response->getBody()->write($html);
    return $response;
});

$app->run();