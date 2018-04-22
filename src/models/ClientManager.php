<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:58
 */

namespace Src\Model;

class ClientManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Client";
    }
    public function get($id)
    {

    }

    public function getAll()
    {

    }

    public function delete(Client $client)
    {
        parent:: delete($client);

    }

    public function post(Client $client)
    {

    }

    public function put(Client $client)
    {

    }
}