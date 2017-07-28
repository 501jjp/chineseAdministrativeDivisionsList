<?php
/**
 * Created by PhpStorm.
 * User: jjp
 * Date: 2017/7/28
 * Time: 9:19
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\City\Street;
use App\Http\Controllers\City\Area;
use App\Http\Controllers\City\City;
use App\Http\Controllers\City\Province;
use App\Http\Controllers\City\CityList;

class GetJson
{
    //转换成json并返回
    public function getAddressJson()
    {
        $cityListObj = $this->getAddressObject();
        return json_encode($cityListObj);

    }

    //获取数组
    private function getAddressObject()
    {
        $Province_A= $this->getProvinceArray();
        $cityList = new CityList();
        $cityList->citylist = $Province_A;
        return $cityList;
    }

    //获取省级数组
    private function getProvinceArray()
    {
        $arrObj = DB::table('province')->get();
        $arr = $arrObj->all();
        $Province_A = [];
        foreach ($arr as $key=>$value){
            $province = new Province($value->name,$value->province_id);
            $Province_A[] = $province;
        }

        $City_A = $this->getCityArray();
        foreach ($Province_A as $key=>$value){
            $cityId = $value->getProvinceId();
            if(isset($City_A[$cityId])){
                $value->c = $City_A[$cityId];
            }
        }
        return $Province_A;
    }

    //获取市级数组
    public function getCityArray()
    {
        $arrObj = DB::table('city')->select('city_id','name','province_id')->get();
        $arr = $arrObj->all();
        $City_A = [];
        foreach ($arr as $key=>$value){
            $city = new City($value->name,$value->city_id);
            $City_A[$value->province_id][] = $city;
        }

        $Area_A = $this->getAreaArray();
        foreach ($City_A as $key=>$value){
            foreach ($value as $k=>$v){
                $cityId = $v->getCityId();
                if(isset($Area_A[$cityId])){
                    $v->a = $Area_A[$cityId];
                }
            }
        }

        return $City_A;
    }

    //获取区县级数组
    public function getAreaArray()
    {
        $arrObj = DB::table('area')->select('name','area_id','city_id')->get();
        $arr = $arrObj->all();
        $Area_A = [];
        foreach ($arr as $key=>$value){
            $area = new Area($value->name,$value->area_id);
            $Area_A[$value->city_id][] = $area;
        }

        $Street_A = $this->getStreetArray();
        foreach ($Area_A as $key=>$value){
            foreach ($value as $k=>$v){
                $areaId = $v->getAreaId();
                if(isset($Street_A[$areaId])){
                    $v->j = $Street_A[$areaId];
                }
            }
        }
        return $Area_A;
    }

    //获取街道级数组
    private function getStreetArray()
    {
        $arrObj = DB::table('street')->select('street_name', 'area_id','street_id')->get();
        $arr = $arrObj->all();
        foreach ($arr as $key=>$value){
            $street = new Street($value->street_name,$value->street_id);
            $change[$value->area_id][] = $street;
        }
        return $change;
    }
}