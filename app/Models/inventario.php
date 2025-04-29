<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Inventario extends Model
{
    // Usar SoftDeletes para eliminar registros de manera lógica
    use HasFactory,SoftDeletes;

    // Nombre de la tabla en la base de datos
    protected $table = 'inventarios';

    // Campos que se pueden asignar masivamente
    protected $fillable = [
        'producto_id', // Clave foránea que referencia a la tabla productos
        'tipoMovimiento', // Tipo de movimiento: entrada, salida, actualización
        'cantidad', // Cantidad del movimiento
        'precio', // Precio del movimiento
    ];

    // Campos de fecha (timestamps y soft deletes)
    protected $dates = ['deleted_at'];

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}