<?php

namespace App\Http\Controllers\City;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;

class DeleteController extends Controller
{
    public function index(int $id){

        $id = filter_var($id,FILTER_VALIDATE_INT);
        try{
            City::find($id)->delete();
            return Response()->json("Cidade removida com sucesso." ,200);
        }catch(\Exception $e){
            return Response()->json("Error ao remove a cidade.", 423);
        }
    }
}
