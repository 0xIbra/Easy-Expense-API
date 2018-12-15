<?php
/**
 * Created by PhpStorm.
 * User: ibragim.abubakarov
 * Date: 20/04/2018
 * Time: 18:58
 */

namespace Src\Config;

use \PDO;


class Bdd {
    private $dbhost = "mysql:********************************;";
    private $dbuser = "*********";
    private $dbpass = "*********";

    public function connect(){
        $conn = new PDO($this->dbhost, $this->dbuser, $this->dbpass);
        return $conn;
    }
}