<?php
/**
 * Created by PhpStorm.
 * User: jjp
 * Date: 2017/7/28
 * Time: 11:05
 */

namespace App\Http\Controllers\City;


class CityList
{
    public $citylist = [];

}

class Provice
{
    public $p = "";
    public $c = [];
}

class City
{
    public $n = "";
    public $a = [];
}

class area
{
    public $s = "";
    public $j = [];
}

class street
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

