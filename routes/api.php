<?php

use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Resources\ProductoResource;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});
Route::get ('/producto' ,function(){
    return ProductoResource::collection(producto::all());
});
Route::resource('prueba', ProductoController::class);

Route:: resource('prueba2', InventarioController::class);