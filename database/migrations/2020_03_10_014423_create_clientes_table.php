<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            // Listo
            $table->id();
            $table->integer('nro_cliente');
            $table->string("codigo");
            $table->string("nombre");
            $table->string("direccion");
            $table->string("cedula");
            $table->string("telefono");
            $table->enum('tipo', ['Minorista', 'Mayorista', 'VIP']);
            $table->integer('facturas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
