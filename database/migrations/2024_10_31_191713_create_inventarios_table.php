<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productoId')->constrained('productos')->cascadeOnUpdate();
            $table->enum('tipoMovimiento',['entrada', 'salida','actualizacion']);
            $table->integer('cantidad');
            $table->float('precio');
            $table->timestamps();
            $table->softDeletes();

        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventarios');
    }
};
