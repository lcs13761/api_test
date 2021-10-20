<?php

namespace App\Http\Controllers\Discount;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Discount;

class GetController extends Controller
{
    public function index(){
        
        return Response()->json((new Discount())->get(), 200);
    }
}
