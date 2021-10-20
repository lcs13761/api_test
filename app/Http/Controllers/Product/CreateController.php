<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CreateController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'product' => 'required',
            'campaign' => 'required|int',
            'value' => 'required',
            'discount' => 'required|int'
        ]);

        $create = [
            'name_product' => $request->product,
            'campaign_id' => $request->campaign, 
            'value_product' => $request->value,
            'discount_id' => $request->discount,
        ];

        if (!Product::create($create)) {
            return Response()->json("Error ao criar o produto.", 423);
        }
        $this->response["result"] = "Registrado com sucesso";
        return Response()->json($this->response, 200);
    }
}
