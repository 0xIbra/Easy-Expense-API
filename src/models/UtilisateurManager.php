<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:54
 */

namespace Src\Model;

class UtilisateurManager extends Manager{

    /**
     * UtilisateurManager constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = "Utilisateur";
        $this->object = 'Utilisateur $utilisateur';
    }


    /**
     * @param $token
     * @param $email
     * @param $pass
     * @return string
     */
    function AuthToken($token, $email, $pass){
        $SQL = "SELECT idUtilisateur, AuthToken FROM Utilisateur WHERE AuthToken = :token AND mailUtilisateur = :mail AND mdpUtilisateur = :pass";
      
        $req = $this->db->prepare($SQL);
        $req->bindValue('token', $token, PDO::PARAM_STR);
        $req->bindValue('mail', $email, PDO::PARAM_STR);
        $req->bindValue('pass', $pass, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();
        $obj = new StdClass();
        $obj->id = $result['idUtilisateur'];
        $obj->AuthToken = $result['AuthToken'];
      
        return json_encode($obj, JSON_UNESCAPED_UNICODE);
    }


    /**
     * @param $mail
     * @param $pass
     * @return string
     */
    function Authentification($mail, $pass){
        $SQL = "SELECT * FROM Utilisateur WHERE mailUtilisateur = :mail AND mdpUtilisateur = :pass";

        $req = $this->db->prepare($SQL);
        $req->bindValue('mail', $mail, \PDO::PARAM_STR);
        $req->bindValue('pass', $pass, \PDO::PARAM_STR);
        $req->execute();

        $user = $req->fetch(\PDO::FETCH_OBJ);

        return json_encode($user, JSON_UNESCAPED_UNICODE);
    }


    /**
     * @return string
     */
    public function getCustomers(){
        $SQL = "SELECT * FROM Utilisateur";

        $req = $this->db->query($SQL);
        $res = $req->fetchAll(\PDO::FETCH_OBJ);
        return json_encode($res, JSON_UNESCAPED_UNICODE);
    }


    /**
     * @param $email
     * @param $password
     * @return string
     */
    function HttpConnRequest($email, $password){
        
        $SQL = "SELECT * FROM Utilisateur WHERE mailUtilisateur = :email AND mdpUtilisateur = :mdp AND typeCompte ='Commercial' ";

        $req = $this->db->prepare($SQL);
        $req->bindValue('email', $email, PDO::PARAM_STR);
        $req->bindValue('mdp', $password, PDO::PARAM_STR);
        $req->execute();
        $result =  $req->fetch();

        $user = new StdClass();
        $user->id = $result['idUtilisateur'];
        $user->email = $result['mailUtilisateur'];
        $user->password = $result['mdpUtilisateur'];

        return json_encode($user, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $token
     * @param $id
     * @return string
     */
    public function getUserSession($token, $id){
    
        $SQL = "SELECT * FROM Utilisateur WHERE AuthToken = :token AND idUtilisateur = :id";
        $req = $this->db->prepare($SQL);
        $req->bindValue('token', $token, PDO::PARAM_STR);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();
      
        $user = new StdClass();
        $user->id = $result['idUtilisateur'];
        $user->email = $result['mailUtilisateur'];
        $user->nom = $result['nomUtilisateur'];
        $user->prenom = $result['prenomUtilisateur'];
        return json_encode($user, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @param $id
     * @return mixed|Utilisateur
     */
    public function get($id)
    {
        $result = parent::read($id);
        return new Utilisateur($result);
    }

    /**
     * @return array
     */
    public function getAll()
    {
        $result = parent:: getAll();
        $collUtilisateurs = [];
        foreach ($result as $value) {
            $collUtilisateurs[] = new Utilisateur($value);
        }
        return $collUtilisateurs;
    }

    /**
     * @param $object
     */
    public function delete($object)
    {
        parent:: delete($this->$object);

    }

    /**
     * @param Utilisateur $utilisateur
     */
    public function post(Utilisateur &$utilisateur)
    {

    }


    /**
     * @param Utilisateur $utilisateur
     * @return bool
     */
    public function put(Utilisateur $utilisateur){
        $SQL = "UPDATE Utilisateur SET mailUtilisateur=:mail, mdpUtilisateur=:pass, adresseUtilisateur=:adresse,  codePostalUtilisateur=:cp, villeUtilisateur=:ville, telUtilisateur=:tel, 
                nomUtilisateur=:nom, prenomUtilisateur=:prenom, AuthToken=:token WHERE idUtilisateur = :idU";

        $token = base64_encode($utilisateur->getMailUtilisateur().$utilisateur->getMdpUtilisateur());

        $req = $this->db->prepare($SQL);
        $req->bindValue('mail', $utilisateur->getMailUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('pass', $utilisateur->getMdpUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('adresse', $utilisateur->getAdresseUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('cp', $utilisateur->getCodePostalUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('ville', $utilisateur->getVilleUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('tel', $utilisateur->getTelUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('nom', $utilisateur->getNomUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('prenom', $utilisateur->getPrenomUtilisateur(), \PDO::PARAM_STR);
        $req->bindValue('token', $token, \PDO::PARAM_STR);
        $req->bindValue('idU', $utilisateur->getIdUtilisateur(), \PDO::PARAM_INT);
        $res = $req->execute();

        if ($res){
            return true;
        }else{
            return false;
        }
    }


}