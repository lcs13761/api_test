<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Http\JsonResponse;

class CreateController extends Controller{
    
    public function index(Request $request){

        $request->validate([
            "campaign_name" => "required",
            "campaign_objective" => "required",
        ]);

        $checkCampaign = Campaign::where("campaign_name", $request->campaign_name)->exists();
        if ($checkCampaign) {
            return Response()->json("Campanha já esta cadastrado", 403);
        }

        $create = [
            "campaign_name" => $request->campaign_name,
            "campaign_objective" => $request->campaign_objective
        ];
        if (!Campaign::create($create)) {
            return Response()->json("Error ao salva os dados", 500);
        };
        $this->response["result"] = "Registrado com sucesso";
        return Response()->json($this->response, 200);
    }
}
