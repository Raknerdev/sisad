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
            $table->integer('id_cliente');
            $table->date('fecha_emision');
            $table->string('ctrl_patio');
            $table->string('ctrl_factura');
            $table->string('cod_cliente');
            $table->enum('cliente', ['Minorista', 'Mayorista', 'VIP']);
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
            $table->longText('productos')->nullable();
            $table->string('pesos')->nullable();
            // Datos de Reporte
            $table->enum('forma_pago', ['Efectivo','Transferencia','Otro']);
            $table->string('ref')->nullable()->default('N/P');
            $table->float('total');
            $table->date('fecha_pago')->nullable();
            $table->float('abono')->nullable()->default(0);
            $table->float('debe')->nullable()->default(0);
            $table->float('resta')->nullable()->default(0);
            $table->float('descuento')->nullable()->default(0);
            $table->string('observacion')->nullable();
            $table->enum('estado', ['Pendiente', 'Completada', 'Anulada'])->default('Pendiente');

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
