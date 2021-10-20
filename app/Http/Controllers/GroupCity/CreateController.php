<?php

namespace App\Http\Controllers\GroupCity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupCity;

class CreateController extends Controller
{
    public function index(Request $request){
        $request->validate([
                'group_name' => 'required',
                'campaign' => 'required|int',
            ]);

        $create = ['group_name' => $request->group_name, 'campaign_id' => $request->campaign];
        
        if(!GroupCity::create($create)){
            return Response()->json("Error ao criar o grupo.", 423);
        }
        $this->response["result"] = "Registrado com sucesso";
        return Response()->json($this->response ,200);
    }

}
