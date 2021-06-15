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
            // Datos de Factura - Verificar
            $table->integer('id_factura');
            $table->string('nro_factura');
            $table->string('nro_control');
            // $table->date('fecha_emision');
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
            // Aqui van los productos

            // Continuamos xD
            $table->float('sub_total');
            $table->float('total');
            $table->enum('tipo_cliente', ['Minorista', 'Mayorista', 'VIP']);
            $table->enum('forma_pago', ['Efectivo','Transferencia','Otro']);
            // $table->enum('productos', ['']);
            // Datos para Reporte
            $table->float('abono')->nullable()->default(0);
            $table->float('resta')->nullable()->default(0);
            $table->float('descuento')->nullable()->default(0);
            $table->string('observacion')->nullable();
            $table->enum('estado', ['Pendiente', 'Completada'])->default('Pendiente');
            
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
