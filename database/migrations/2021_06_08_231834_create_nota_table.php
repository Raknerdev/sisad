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
            $table->string('nro_control');
            $table->string('nro_factura');
            $table->enum('cliente', ['Minorista', 'Mayorista', 'VIP']);
            $table->string('nombre_c');
            $table->string('cedula_c');
            $table->string('telefono')->nullable();
            $table->string('direccion_c')->nullable();
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
