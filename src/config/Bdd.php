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
    private $dbhost = "mysql:host=e91099-mysql.services.easyname.eu;dbname=u143944db1;charset=utf8;";
    private $dbuser = "u143944db1";
    private $dbpass = "12345678*";

    public function connect(){
        $conn = new PDO($this->dbhost, $this->dbuser, $this->dbpass);
        return $conn;
    }
}