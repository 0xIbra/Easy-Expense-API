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

$app->get("/", function(Request $request, Response $response){
    $response->getBody()->write("API Easy Expense");
    return $response;
});

$app->run();