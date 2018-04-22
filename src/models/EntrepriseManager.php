<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 03/04/2018
 * Time: 12:00
 */

namespace Src\Model;

class EntrepriseManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Entreprise";
    }
    public function get($id)
    {

    }

    public function getAll()
    {

    }

    public function delete(Entreprise $entreprise)
    {
        parent:: delete($entreprise);

    }

    public function post(Entreprise $entreprise)
    {

    }

    public function put(Entreprise $entreprise)
    {

    }
}