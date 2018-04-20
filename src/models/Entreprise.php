<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 03/04/2018
 * Time: 11:54
 */

namespace Src\Model;

class Entreprise extends Entity
{
    private $idEntreprise;
    private $raisonSociale;
    private $noSiret;
    private $adresseEntreprise;
    private $codePostalEntreprise;
    private $villeEntreprise;
    private $telEntreprise;

    public function __construct($values)
    {
        parent::__construct($values);
    }
    function postEntreprise(Entreprise $entreprise)
    {

    }

    function getEntreprise($idEntreprise)
    {

    }

    function deleteEntreprise(Entreprise $entreprise)
    {

    }

}