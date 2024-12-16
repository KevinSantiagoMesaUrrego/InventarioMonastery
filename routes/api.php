<?php

use App\Http\Resources\ProductoResource;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Pest\Laravel\json;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get ('/producto' ,function(){
    return ProductoResource::collection(producto::all());
});
$api =3;
Route::get('prueba',function() use ($api){
    return response()-> json(['message'=> $api]);});