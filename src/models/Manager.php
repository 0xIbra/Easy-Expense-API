<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:53
 */

namespace Src\Model;

use Src\Config\Bdd as DB;

abstract class Manager
{
    protected $db;
    protected $table;
    protected $champs = [];
    protected $object;

    public function __construct($mode = 'prod')
    {

        if ($mode == 'dev') {
            $this->db = new DB();
            $this->db = $this->db->connect();
        } else {
            $this->db = new DB();
            $this->db = $this->db->connect();
        }
    }

    public function get($id)
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $id, PDO::PARAM_INT);
        $req->execute();
        $result = $req->fetch();

        return $result;
    }

    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $req = $this->db->query($sql);
        $resultats = $req->fetchAll();
        return $resultats;
    }

    public function delete($object)
    {
        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $req = $this->db->prepare($sql);
        $req->bindValue('id', $object->getId(), PDO::PARAM_INT);
        $req->execute();
    }
}