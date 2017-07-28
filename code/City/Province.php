<?php
/**
 * Created by PhpStorm.
 * User: jjp
 * Date: 2017/7/28
 * Time: 11:41
 */

namespace App\Http\Controllers\City;


class Province
{
    public $p = "";
    public $c = [];
    private $province_id = "";

    public function __construct($p,$province_id)
    {
        $this->p = $p;
        $this->province_id = $province_id;
    }

    public function getProvinceId()
    {
        return $this->province_id;
    }

}