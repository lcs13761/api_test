<?php

namespace App\Http\Controllers\GroupCity;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupCity;

class DeleteController extends Controller
{
    public function index(int $id){
        $id = filter_var($id,FILTER_VALIDATE_INT);

        try{
            GroupCity::find($id)->delete();
            return Response()->json("Grupo removido com sucesso." ,200);
        }catch(\Exception $e){
            return Response()->json("Error ao remove o grupo.", 423);
        }
    }
}
