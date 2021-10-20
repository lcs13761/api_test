<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

class UpdateController extends Controller
{
    public function index(Request $request, int $id){

        $request->validate([
            'discount' => 'required',
        ]);

        $updateGroup = Discount::find($id);
        if (!$updateGroup) {
            return Response()->json("Disconto não encontrado.", 403);
        }

        $updateGroup->discount = $request->discount;

        if (!$updateGroup->save()) {
            return Response()->json("Error ao salva os dados", 500);
        }
        $this->response["result"] = "Editado com sucesso";
        return Response()->json($this->response, 200);
    }
}
