<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\GroupCity;

class CreateController extends Controller
{
    public function index(Request $request){
        $request->validate([
                'city' => 'required',
                'state' => 'required|size:2',
                'group_city' => 'required|int'
            ]);

        if(GroupCity::where("id",$request->group_city)->count() == 0){
            return Response()->json("Informe um Grupo valido.", 423);
        }

        $create = ['city' => $request->city, 'state' => $request->state,'group_city_id' => $request->group_city];
        
        if(!City::create($create)){
            return Response()->json("Error ao criar a cidade.", 423);
        }
        $this->response["result"] = "Registrado com sucesso";
        return Response()->json($this->response ,200);
    }
}
