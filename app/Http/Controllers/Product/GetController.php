<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class GetController extends Controller
{
    public function index()
    {
        $products =  Product::leftJoin('campaign', 'campaign.id', "=", "products.campaign_id")
        ->leftJoin('discounts', 'discounts.id', "=", "products.discount_id")
        ->select("products.*", "campaign.*","discounts.*")->get();
        return Response()->json($products, 200);
    }
}
