<?php

namespace App\Http\Controllers\GroupCity;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Models\GroupCity;

class GetController extends Controller
{

    public function index()
    {

        $get = (new GroupCity())->get();
        $response = $this->getGroupCity($get);
        return Response()->json($response, 200);
    }

    private function getGroupCity($get)
    {

        if ($get->isEmpty()) {
            return $get;
        }
        $response = [];
        $i = 0;
        foreach ($get as $value) {

            $response[$i]["id"] = $value["id"];
            $response[$i]["group_name"] = $value["group_name"];
            $campaign = Campaign::find($value["campaign_id"]);
            $response[$i]["campaign"] = $campaign;
            $i++;
        }
        return $response;
    }
}
