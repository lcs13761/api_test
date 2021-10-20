<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Http\JsonResponse;

class UpdateController extends Controller{

    public function index(Request $request, int $id){

        $updateCampaign = Campaign::find($id);
        if(empty($updateCampaign)){
            return Response()->json("Campanha não encontrado.", 500);
        }

        $updateCampaign->campaign_name = $request->campaign_name ?? $updateCampaign->campaign_name;
        $updateCampaign->campaign_objective = $request->campaign_objective ?? $updateCampaign->campaign_objective;

        if(!$updateCampaign->save()) {
            return Response()->json("Error ao salva os dados", 500);
        }
        $this->response["result"] = "Editado com sucesso";
        return Response()->json($this->response ,200);
    }
}
