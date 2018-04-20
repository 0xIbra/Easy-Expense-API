<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 09:59
 */

namespace Src\Model;

class TrajetManager extends DepenseManager
{
    public function __construct(){
        parent::__construct();
        $this->table = "Trajet";
    }
}