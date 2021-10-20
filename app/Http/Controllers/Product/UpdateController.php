<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class UpdateController extends Controller
{
    public function index(Request $request, int $id){

        $id = filter_var($id, FILTER_VALIDATE_INT);
        $updateGroup = Product::find($id);

        if (!$updateGroup) {
            return Response()->json("Produto não encontrado.", 403);
        }

        $updateGroup->name_product = $request->product ?? $updateGroup->name_product;
        $updateGroup->value_product = !empty($request->value) ? (float)$request->value :  $updateGroup->value;
        $updateGroup->campaign_id = !empty($request->campaign) ? (int)$request->campaign : $updateGroup->campaign_id;
        $updateGroup->discount_id = !empty($request->discount) ? (int)$request->discount : $updateGroup->discount_id;

        if (!$updateGroup->save()) {
            return Response()->json("Error ao salva os dados", 500);
        }
        $this->response["result"] = "Editado com sucesso";
        return Response()->json($this->response, 200);
    }
}
