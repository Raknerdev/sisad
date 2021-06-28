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
            // Datos de Factura
            $table->string('nro_factura');
            $table->string('nro_control');
            $table->date('fecha_emision');
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
            $table->longText('productos')->nullable();
            $table->string('pesos')->nullable();
            $table->float('sub_total');
            $table->float('iva');
            $table->float('valor_iva');
            $table->float('total');
            $table->enum('tipo_cliente', ['Minorista', 'Mayorista', 'VIP']);
            $table->enum('forma_pago', ['Efectivo', 'Transferencia', 'Otro']);
            // Marca de Tiempo
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
