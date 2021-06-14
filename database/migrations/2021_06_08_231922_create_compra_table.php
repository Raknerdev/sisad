<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compra', function (Blueprint $table) {
            $table->id();
            // Datos Factura
            $table->enum('tipo_cliente', ['MINORISTA', 'MAYORISTA', 'VIP']);
            $table->string('nro_ctrl_patio');
            $table->string('nro_ctrl_factura');
            $table->date('fecha_emision');
            $table->string('cod_cliente');
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
            // Relacion Productos aqui

            // Seguimos con la factura
            $table->float('total_peso_prod');
            $table->float('sub_total');
            $table->float('total');
            // Datos para Reporte
            $table->float('abono');
            $table->float('resta');
            $table->float('descuento');
            $table->string('observacion')->nullable();
            $table->enum('estado', ['Pendiente', 'Completada']);

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
        Schema::dropIfExists('compra');
    }
}
