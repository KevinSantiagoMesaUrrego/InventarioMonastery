<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductoResource;
use App\Models\producto;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProductoResource::collection(Producto::all());
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'aca va la vista del crear';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:productos|max:20',
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0'
        ]);
        $producto = Producto::create($request->all());
        return response()->json($producto, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontradoo'], 404);
        }
        return response()->json($producto, 200);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontradoo'], 404);
        }

        $request->validate([
            'nombre' => [
                'required',
                Rule::unique('productos')->ignore($id)
            ],
            'cantidad' => 'required|integer|min:0',
            'precio' => 'required|numeric|min:0',
        ]);

        $producto->update($request->all());
        return response()->json($producto, 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $producto= producto::find($id);
        if (!$producto) {
            return response()->json(['message' => 'Producto no encontradoo'], 404);
        }
        $producto->delete();
        return response()->json(['message' => 'se elimino exitosamente'], 207);
}
}