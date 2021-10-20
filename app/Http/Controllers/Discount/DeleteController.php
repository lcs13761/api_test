<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

class DeleteController extends Controller
{
    public function index(int $id){

        $id = filter_var($id, FILTER_VALIDATE_INT);
        try {
            Discount::find($id)->delete();
            return Response()->json("Produto removida com sucesso.", 200);
        } catch (\Exception $e) {
            return Response()->json("Error ao remove o produto.", 423);
        }
    }
}
