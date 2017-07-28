<?php
/**
 * Created by PhpStorm.
 * User: jjp
 * Date: 2017/7/28
 * Time: 11:42
 */

namespace App\Http\Controllers\City;


class Street
{
    public $e = "";
    private $area_id = "";

    public function __construct($e,$area_id)
    {
        $this->e = $e;
        $this->area_id = $area_id;
    }

    public function getAreaID(){
        return $this->area_id;
    }
}