<?php

use App\Http\Controllers\Campaign;
use App\Http\Controllers\GroupCity;
use App\Http\Controllers\City;
use App\Http\Controllers\Product;
use App\Http\Controllers\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get("/campanhas", [Campaign\GetController::class,'index']);
Route::post("/adicionar/campanha", [Campaign\CreateController::class,'index']);
Route::put('/editar/campanha/{id}',[Campaign\UpdateController::class,'index'])->where('id','[0-9]+');
Route::delete('/remover/campanha/{id}',[Campaign\DeleteController::class,'index'])->where('id','[0-9]+');

Route::get("/grupos", [GroupCity\GetController::class,'index']);
Route::post('/adicionar/grupo',[GroupCity\CreateController::class,'index']);
Route::put('/editar/grupo/{id}',[GroupCity\UpdateController::class,'index'])->where('id','[0-9]+');
Route::delete('/remover/grupo/{id}',[GroupCity\DeleteController::class,'index'])->where('id','[0-9]+');

Route::get("/cidades", [City\GetController::class,'index']);
Route::post('/adicionar/cidade',[City\CreateController::class,'index']);
Route::put('/editar/cidade/{id}',[City\UpdateController::class,'index'])->where('id','[0-9]+');
Route::delete('/remover/cidade/{id}',[City\DeleteController::class,'index'])->where('id','[0-9]+');

Route::get("/produtos", [Product\GetController::class,'index']);
Route::post('/adicionar/produto',[Product\CreateController::class,'index']);
Route::put('/editar/produto/{id}',[Product\UpdateController::class,'index'])->where('id','[0-9]+');
Route::delete('/remover/produto/{id}',[Product\DeleteController::class,'index'])->where('id','[0-9]+');

Route::get("/descontos", [Discount\GetController::class,'index']);
Route::post('/adicionar/desconto',[Discount\CreateController::class,'index']);
Route::put('/editar/desconto/{id}',[Discount\UpdateController::class,'index'])->where('id','[0-9]+');
Route::delete('/remover/desconto/{id}',[Discount\DeleteController::class,'index'])->where('id','[0-9]+');

