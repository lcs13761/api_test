<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

class CreateController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'discount' => 'required',
        ]);

        $create = [
            'discount' => $request->discount,
        ];

        if (!Discount::create($create)) {
            return Response()->json("Error ao criar o produto.", 423);
        }
        $this->response["result"] = "Registrado com sucesso";
        return Response()->json($this->response, 200);
    }
}
