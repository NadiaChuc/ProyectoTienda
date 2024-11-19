<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detalles_compra', function (Blueprint $table) {
            $table->unsignedInteger('id_compra');
            $table->unsignedInteger('id_producto');
            $table->integer('quantity');
            $table->float('mount');
            $table->foreign('id_compra')->references('id_compra')->on('compras')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalles_compra');
    }
};
