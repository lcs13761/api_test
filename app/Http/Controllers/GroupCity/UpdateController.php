<?php

namespace App\Http\Controllers\GroupCity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupCity;

class UpdateController extends Controller
{
    public function index(Request $request,int $id){

        $id = filter_var($id,FILTER_VALIDATE_INT);
        $updateGroup = GroupCity::find($id);

        if(!$updateGroup){
            return Response()->json("Grupo não encontrado.", 403);
        }

        $updateGroup->group_name = $request->group_name ?? $updateGroup->group_name;
        $updateGroup->campaign_id = $request->campaign ?? $updateGroup->campaign_id;

        if(!$updateGroup->save()) {
            return Response()->json("Error ao salva os dados", 500);
        }
        $this->response["result"] = "Editado com sucesso";
        return Response()->json($this->response ,200);
    }

}
