<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venta', function (Blueprint $table) {
            $table->id();

            $table->string('nro_control');
            $table->string('nro_factura');
            $table->date('fecha_emision');
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->enum('cliente', ['MINORISTA', 'MAYORISTA', 'VIP']);
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
            $table->float('sub_total');
            $table->float('total');
            
            $table->timestamps();
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venta');
    }
}
