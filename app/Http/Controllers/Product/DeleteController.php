<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class DeleteController extends Controller
{
    public function index(int $id)
    {

        $id = filter_var($id, FILTER_VALIDATE_INT);
        try {
            Product::find($id)->delete();
            return Response()->json("Produto removida com sucesso.", 200);
        } catch (\Exception $e) {
            return Response()->json("Error ao remove o produto.", 423);
        }
    }
}
