<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:58
 */

namespace Src\Model;

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
        $SQL = "SELECT * FROM NoteDeFrais WHERE idUtilisateur = :id ORDER BY codeFrais DESC ";
        $req = $this->db->prepare($SQL);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetchAll(PDO::FETCH_ASSOC);
        
        $notes = [];
        $idClient = null;
        foreach($result as $value){
                if($value['idClient'] == null){
                  $idClient = 0;
                }else{
                  $idClient = $value['idClient'];
                }
        
          $note = new StdClass();
          $note->codeFrais = $value['codeFrais'];
          $note->libelleNote = $value['libelleNote'];
          $note->dateFrais = $value['dateFrais'];
          $note->villeFrais = $value['villeFrais'];
          $note->dateSoumission = $value['dateSoumission'];
          $note->commentaireFrais = $value['commentaireFrais'];
          $note->etat = $value['etat'];
          $note->idUtilisateur = $value['idUtilisateur'];
          $note->idClient = $idClient;
        
          $notes[] = $note;
        
            
        }
          
          
        return json_encode($notes, JSON_UNESCAPED_UNICODE);       
    }


    /**
     * @param $libelle
     * @param $idUtilisateur
     * @return string
     */
    function post($libelle, $idUtilisateur){
        $SQL = "INSERT INTO NoteDeFrais (libelleNote, dateFrais, dateSoumission, idUtilisateur) VALUES (:libelle, now(), now(), :idUtilisateur)";
        $req = $this->db->prepare($SQL);
        $values = [
            'libelle' => $libelle,
            'idUtilisateur' => $idUtilisateur
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