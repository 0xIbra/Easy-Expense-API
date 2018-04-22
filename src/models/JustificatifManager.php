<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:57
 */

namespace Src\Model;

class JustificatifManager extends Manager
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Justificatif";
    }

    public function get(Depense $depense)
    {

    }

    public function getAll()
    {

    }

    public function delete(Justificatif $justificatif)
    {
        parent:: delete($justificatif);

    }

    public function post(Justificatif $justificatif)
    {

    }

    public function put(Justificatif $justificatif)
    {

    }
}