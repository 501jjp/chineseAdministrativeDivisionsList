<?php
/**
 * Created by PhpStorm.
 * User: jjp
 * Date: 2017/7/28
 * Time: 11:41
 */

namespace App\Http\Controllers\City;


class City
{
    public $n = "";
    private $cityId = "";
    public $a = [];

    public function __construct($n,$cityId)
    {
        $this->n = $n;
        $this->cityId = $cityId;
    }

    public function getCityId()
    {
        return $this->cityId;
    }
}