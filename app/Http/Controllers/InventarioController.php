<?php

namespace App\Http\Controllers;

use App\Http\Resources\InventarioResource;
use App\Models\Inventario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class InventarioController extends Controller
{
     /**
     * Display a listing of the resource.
     */
     public function index()
     {
        return InventarioResource::collection(Inventario::all());
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
        try {
            // Validar los datos de entrada
            $request->validate([
                'producto_id' => 'required|exists:productos,id',
                'tipoMovimiento' => 'required|in:entrada,salida,actualización',
                'cantidad' => 'required|integer|min:1',
                'precio' => 'required|numeric|min:0',
            ]);

            // Crear el registro en la base de datos
            $inventario = Inventario::create($request->all());

            // Retornar una respuesta JSON con el registro creado y un mensaje de éxito
            return response()->json([
                'message' => 'Inventario creado correctamente',
                'data' => $inventario,
            ], 201); // Código 201: Created

        } catch (\Throwable $th) {
            // Retornar una respuesta JSON con un mensaje de error y el mensaje de la excepción
            return response()->json([
                'message' => 'No se pudo crear el inventario',
                'error' => $th->getMessage(),
            ], 500); // Código 500: Internal Server Error
        }
    }

     /**
      * Display the specified resource.
      */
    public function show($id)
     {
         $inventario = Inventario::find($id);
         if (!$inventario) {
             return response()->json(['message' => 'inventario no encontrado'], 404);
         }
         return response()->json($producto, 201);
     }
    /**
      * Show the form for editing the specified resource.
      */
//   public function edit(producto $producto)
//     {
//         //
//     }

//     /**
//      * Update the specified resource in storage.
//      */
//     public function update(Request $request, $id)
//     {
//         $producto = Producto::find($id);
//         if (!$producto) {
//             return response()->json(['message' => 'Producto no encontradoo'], 404);
//         }

//         $request->validate([
//             'nombre' => [
//                 'required',
//                 Rule::unique('productos')->ignore($id)
//             ],
//             'cantidad' => 'required|integer|min:0',
//             'precio' => 'required|numeric|min:0',
//         ]);

//         $producto->update($request->all());
//         return response()->json($producto, 200);
//     }

//     /**
//      * Remove the specified resource from storage.
//      */
//     public function destroy($id)
//     {
//         $producto= producto::find($id);
//         if (!$producto) {
//             return response()->json(['message' => 'Producto no encontradoo'], 404);
//         }
//         $producto->delete();
//         return response()->json(['message' => 'se elimino exitosamente'], 207);
// }
}