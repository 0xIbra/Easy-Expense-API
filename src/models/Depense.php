<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:36
 */

namespace Src\Model;

abstract class Depense extends Entity
{
    private $idDepense;
    private $datePaiement;
    private $montantRemboursement;
    private $etatValidation;
    private $dateValidation;
    private $montantDepense;
    private $codeFrais;
    private $idUtilisateur;

    public function __construct($values)
    {
        parent::__construct($values);

    }

}