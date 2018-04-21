<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 19/03/2018
 * Time: 17:19
 */

namespace Src\Model;

class Utilisateur extends Entity
{
    private $idUtilisateur;
    private $mailUtilisateur;
    private $mdpUtilisateur;
    private $adresseUtilisateur;
    private $codePostalUtilisateur;
    private $villeUtilisateur;
    private $telUtilisateur;
    private $typeCompte;
    private $nomUtilisateur;
    private $prenomUtilisateur;
    private $idEntreprise;
    private $collDepense;
    private $collNoteDeFrais;
    private $collCommerciaux;


    public function __construct($values)
    {
        parent::__construct($values);
    }


    function postDepense(Depense $depense)
    {

    }

    function getDepense($idUtilisateur)
    {

    }

    function deleteDepense(Depense $depense)
    {

    }

    function countDepense()
    {

    }

    function postNoteDeFrais(NoteDeFrais $noteDeFrais)
    {

    }

    function getNoteDeFrais($idUtilisateur)
    {

    }

    function deleteNoteDeFrais(NoteDeFrais $noteDeFrais)
    {

    }

    function countNoteDeFrais()
    {

    }

    function postCommerciaux(Utilisateur $utilisateur)
    {

    }

    function getCommerciaux($idUtilisateur)
    {

    }

    function deleteCommerciaux(Utilisateur $utilisateur)
    {

    }

    function countCommerciaux()
    {

    }

    /**
     * @param mixed $idUtilisateur
     */
    public function setIdUtilisateur($idUtilisateur)
    {
        $this->idUtilisateur = $idUtilisateur;
    }

    /**
     * @param mixed $mailUtilisateur
     */
    public function setMailUtilisateur($mailUtilisateur)
    {
        $this->mailUtilisateur = $mailUtilisateur;
    }

    /**
     * @param mixed $mdpUtilisateur
     */
    public function setMdpUtilisateur($mdpUtilisateur)
    {
        $this->mdpUtilisateur = $mdpUtilisateur;
    }

    /**
     * @param mixed $adresseUtilisateur
     */
    public function setAdresseUtilisateur($adresseUtilisateur)
    {
        $this->adresseUtilisateur = $adresseUtilisateur;
    }

    /**
     * @param mixed $codePostalUtilisateur
     */
    public function setCodePostalUtilisateur($codePostalUtilisateur)
    {
        $this->codePostalUtilisateur = $codePostalUtilisateur;
    }

    /**
     * @param mixed $villeUtilisateur
     */
    public function setVilleUtilisateur($villeUtilisateur)
    {
        $this->villeUtilisateur = $villeUtilisateur;
    }

    /**
     * @param mixed $telUtilisateur
     */
    public function setTelUtilisateur($telUtilisateur)
    {
        $this->telUtilisateur = $telUtilisateur;
    }

    /**
     * @param mixed $typeCompte
     */
    public function setTypeCompte($typeCompte)
    {
        $this->typeCompte = $typeCompte;
    }

    /**
     * @param mixed $nomUtilisateur
     */
    public function setNomUtilisateur($nomUtilisateur)
    {
        $this->nomUtilisateur = $nomUtilisateur;
    }

    /**
     * @param mixed $prenomUtilisateur
     */
    public function setPrenomUtilisateur($prenomUtilisateur)
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
    }

    /**
     * @param mixed $idEntreprise
     */
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;
    }

    /**
     * @param mixed $collDepense
     */
    public function setCollDepense($collDepense)
    {
        $this->collDepense = $collDepense;
    }

    /**
     * @param mixed $collNoteDeFrais
     */
    public function setCollNoteDeFrais($collNoteDeFrais)
    {
        $this->collNoteDeFrais = $collNoteDeFrais;
    }

    /**
     * @param mixed $collCommerciaux
     */
    public function setCollCommerciaux($collCommerciaux)
    {
        $this->collCommerciaux = $collCommerciaux;
    }

    /**
     * @return mixed
     */
    public function getIdUtilisateur()
    {
        return $this->idUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getMailUtilisateur()
    {
        return $this->mailUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getMdpUtilisateur()
    {
        return $this->mdpUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getAdresseUtilisateur()
    {
        return $this->adresseUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getCodePostalUtilisateur()
    {
        return $this->codePostalUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getVilleUtilisateur()
    {
        return $this->villeUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getTelUtilisateur()
    {
        return $this->telUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getTypeCompte()
    {
        return $this->typeCompte;
    }

    /**
     * @return mixed
     */
    public function getNomUtilisateur()
    {
        return $this->nomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getPrenomUtilisateur()
    {
        return $this->prenomUtilisateur;
    }

    /**
     * @return mixed
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }










}