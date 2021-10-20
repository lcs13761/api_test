<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class UpdateController extends Controller
{
    public function index(Request $request,int $id){

        $id = filter_var($id,FILTER_VALIDATE_INT);
        $updateGroup = City::find($id);

        if(!$updateGroup){
            return Response()->json("Cidade não encontrado.", 403);
        }

        $updateGroup->city = $request->city ?? $updateGroup->city;
        $updateGroup->state = $request->state ?? $updateGroup->state;
        $updateGroup->group_city_id = (int)$request->group_city != 0 ? (int)$request->group_city : $updateGroup->group_city_id;

        if(!$updateGroup->save()) {
            return Response()->json("Error ao salva os dados", 500);
        }
        $this->response["result"] = "Editado com sucesso";
        return Response()->json($this->response ,200);
    }
}
