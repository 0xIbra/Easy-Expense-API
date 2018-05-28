<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:58
 */

namespace Src\Model;

use \PDO as PDO;

class NoteDeFraisManager extends Manager{

    /**
     * NoteDeFraisManager constructor.
     */
    public function __construct(){
        parent::__construct();
        $this->table = "NoteDeFrais";
    }


    /**
     * @return string
     */
    function getNotesFrais(){
        $SQL = "SELECT * FROM NoteDeFrais";
        $req = $this->db->query($SQL);
        $res = $req->fetchAll(\PDO::FETCH_OBJ);

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $id
     * @return string
     */
    function read($id){
        $SQL = "SELECT * FROM NoteDeFrais WHERE codeFrais = :id";
        $req = $this->db->prepare($SQL);
        $req->bindValue('id', $id, \PDO::PARAM_INT);
        $req->execute();
        $res = $req->fetch(\PDO::FETCH_OBJ);

        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $id
     * @return string
     */
    function getNotesFraisForUser($id){
        $SQL = "SELECT * FROM NoteDeFrais WHERE NoteDeFrais.idUtilisateur = :id ORDER BY codeFrais DESC ";
        $req = $this->db->prepare($SQL);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetchAll(\PDO::FETCH_OBJ);

        foreach ($result as $value) {
            if($value->idClient == null){
                $value->idClient = 0;
            }
        }
        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }


    /**
     * @param $libelle
     * @param $idUtilisateur
     * @return string
     */
    function post(NoteDeFrais $note){
        $SQL = "INSERT INTO NoteDeFrais (libelleNote, dateFrais, dateSoumission, idUtilisateur) VALUES (:libelle, now(), now(), :idUtilisateur)";
        $req = $this->db->prepare($SQL);
        $values = [
            'libelle' => $note->getLibelleNote(),
            'idUtilisateur' => $note->getIdUtilisateur()
            ];
        $req->execute($values);
        $id = $this->db->lastInsertId();
        $note = $this->read($id);
        return $note;
    }

    /**
     * @param $id
     * @return string
     */
  public function getCountById($id){
        $SQL = "SELECT COUNT(codeFrais) as 'nbNotesFrais' FROM NoteDeFrais WHERE idUtilisateur = :id";
    
        $req = $this->db->prepare($SQL);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        
        $res = $req->fetch(PDO::FETCH_OBJ);
    
        return json_encode($res, JSON_UNESCAPED_UNICODE);
  }
    
}