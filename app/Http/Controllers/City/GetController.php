<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\GroupCity;

class GetController extends Controller
{
    public function index(){

        $getCities = (new City())->get();
        $response = $this->get($getCities);
        return Response()->json( $response,200);
    }

    private function get($cities){

        if($cities->isEmpty()){
            return $cities;
        }

        $response = [];
        $i = 0;

        foreach($cities as $city){
            $response[$i]["id"]  = $city["id"];
            $response[$i]["city"] = $city["city"];
            $response[$i]["state"] = $city["state"];
            $group = GroupCity::leftJoin('campaign','campaign.id', "=", "group_cities.campaign_id")
            ->where('group_cities.id', $city["group_city_id"])
            ->select("group_cities.group_name", "campaign.*")->first();
            $response[$i]["group_city"] = $group;
            $i++;
        }

        return $response;
    }
}
