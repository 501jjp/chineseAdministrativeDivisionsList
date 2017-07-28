<?php
/**
 * Created by PhpStorm.
 * User: jjp
 * Date: 2017/7/28
 * Time: 11:42
 */

namespace App\Http\Controllers\City;


class Area
{
    public $s = "";
    public $j = [];
    private $areaId = "";
    public function __construct($s,$areaId)
    {
        $this->s = $s;
        $this->areaId = $areaId;
    }

    public function getAreaId()
    {
        return $this->areaId;
    }
}