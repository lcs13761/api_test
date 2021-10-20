<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use App\Models\GroupCity;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class GetController extends Controller{
    
    public function index(){

        $get = (new Campaign())->get();
        $response = $this->getCampaign($get);
        return Response()->json($response, 200);
    }

    private function getCampaign($campaigns){

        if($campaigns->isEmpty()){
            return $campaigns;
        }

        $response = [];
        $i = 0; 

        foreach($campaigns as $campaign){
            $response[$i]["id"] = $campaign["id"];
            $response[$i]["campaign_name"] = $campaign["campaign_name"];
            $response[$i]["campaign_objective"] = $campaign["campaign_objective"];
            $product = Product::leftJoin('discounts','discounts.id', "=", "products.discount_id")
            ->where('products.campaign_id', $campaign["id"])
            ->select("discounts.discount","products.name_product","products.value_product")->get();
            $response[$i]["product"] = $product;

            $cities = GroupCity::leftJoin('cities','cities.group_city_id', "=", "group_cities.id")
            ->where('group_cities.id', $campaign["id"])
            ->select("group_cities.*", "cities.*")->get();
            $response[$i]["group_city"] = $cities;
            $i++;
        }

        return $response;
    }
}
