<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            // Datos de Nota de Entrega
            $table->date('fecha_emision');
            $table->string('nro_ctrl_patio');
            $table->string('nro_ctrl_factura');
            $table->string('cod_cliente');
            $table->enum('cliente', ['Minorista', 'Mayorista', 'VIP']);
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
            $table->enum('forma_pago', ['Efectivo','Transferencia','Otro']);
            $table->string('ref')->nullable()->default('N/P');
            // Datos de Reporte
            $table->float('total');
            $table->date('fecha_pago')->nullable();
            $table->float('abono');
            $table->float('debe');
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
        Schema::dropIfExists('nota');
    }
}
