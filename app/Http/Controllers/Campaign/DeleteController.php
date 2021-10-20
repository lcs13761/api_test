<?php

namespace App\Http\Controllers\Campaign;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Campaign;
use Illuminate\Http\JsonResponse;

class DeleteController extends Controller{

    public function delete(int $id){

        $id = filter_var($id, FILTER_VALIDATE_INT);
        try {
            Campaign::find($id)->delete();
            $this->response["result"] = "Removido com sucesso.";
            return Response()->json($this->response, 200);
        } catch (\Exception $e) {
            return Response()->json("Error, não foi possivel remover a campanha,por possuir grupos relacionados.", 423);
        }
    }
}
