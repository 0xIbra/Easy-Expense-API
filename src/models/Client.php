<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:46
 */

namespace Src\Model;

class Client extends Entity
{
    private $idClient;
    private $nomClient;
    private $prenomClient;
    private $adresseClient;
    private $villeClient;
    private $codePostalClient;
    private $telClient;
    private $mailClient;
    private $collClient;

    public function __construct($values)
    {
        parent::__construct($values);
    }

    function postClient(Client $client)
    {

    }

    function getClient($idClient)
    {

    }

    function deleteClient(Client $client)
    {

    }

    function countClient()
    {

    }
}