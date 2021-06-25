<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeguimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seguimientos', function (Blueprint $table) {
            $table->id();
            $table->integer('id_cliente');
            $table->integer('id_factura');

            $table->float('total');
            $table->date('fecha_pago')->nullable();
            $table->enum('forma_pago', ['Efectivo', 'Transferencia', 'Otro'])->nullable();
            $table->string('ref')->nullable()->default('N/P');
            $table->float('abono')->nullable();
            $table->float('debe')->nullable();
            $table->float('resta')->nullable();
            $table->float('descuento')->nullable();

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
        Schema::dropIfExists('seguimientos');
    }
}
