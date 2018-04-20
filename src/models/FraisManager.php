<?php
/**
 * Created by PhpStorm.
 * User: Vince
 * Date: 20/03/2018
 * Time: 10:00
 */

namespace Src\Model;

class FraisManager extends DepenseManager
{
    public function __construct()
    {
        parent::__construct();
        $this->table = "Frais";
    }
}