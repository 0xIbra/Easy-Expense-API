<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:56
 */

namespace Src\Model;

use \PDO as PDO;

class DepenseManager extends Manager
{
    public function __construct(){
        parent::__construct();
        $this->table = "Depense";
    }

    /**
     * @param $codeFrais
     * @return string
     */
    public function getDepensesForNote($codeFrais){
      $SQL = "SELECT * FROM ".$this->table.", Frais WHERE Depense.idDepense = Frais.idDepense AND Depense.codeFrais = :idFrais";
      $req = $this->db->prepare($SQL);
      $req->bindValue('idFrais', $codeFrais, PDO::PARAM_INT);
      $req->execute();
      $resultFrais['Frais'] = $req->fetchAll(PDO::FETCH_OBJ);
      $SQL = "SELECT * FROM ".$this->table.", Trajet WHERE Depense.idDepense = Trajet.idDepense AND Depense.codeFrais = :idFrais";
      $req = $this->db->prepare($SQL);
      $req->bindValue('idFrais', $codeFrais, PDO::PARAM_INT);
      $req->execute();
      $resultFrais['Trajet'] = $req->fetchAll(PDO::FETCH_OBJ);
      
      return json_encode($resultFrais, JSON_UNESCAPED_UNICODE);
    }
  
    public function get(Utilisateur $utilisateur)
    {

    }

    public function getAll()
    {

    }
    public function delete(Depense $depense)
    {
        parent:: delete($depense);

    }

    public function post(Depense $depense)
    {

    }

    public function put(Depense $depenses)
    {

    }
}