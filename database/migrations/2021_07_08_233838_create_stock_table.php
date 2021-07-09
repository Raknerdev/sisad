<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('ACERO CORTO')->default(0)->nullable();
            $table->integer('ACERO LARGO')->default(0)->nullable();
            $table->integer('ALUMINIO')->default(0)->nullable();
            $table->integer('BATERIAS')->default(0)->nullable();
            $table->integer('CALAMINA')->default(0)->nullable();
            $table->integer('CHATARRA')->default(0)->nullable();
            $table->integer('CORTO PESADO')->default(0)->nullable();
            $table->integer('DURO')->default(0)->nullable();
            $table->integer('LARGO PESADO')->default(0)->nullable();
            $table->integer('LATA')->default(0)->nullable();
            $table->integer('LATON')->default(0)->nullable();
            $table->integer('MARGINAL')->default(0)->nullable();
            $table->integer('MIXTO')->default(0)->nullable();
            $table->integer('MOTOR DE NEVERA')->default(0)->nullable();
            $table->integer('PERFIL')->default(0)->nullable();
            $table->integer('PLASTICO')->default(0)->nullable();
            $table->integer('PLOMO CHATARRA')->default(0)->nullable();
            $table->integer('PLOMO LINGOTE')->default(0)->nullable();
            $table->integer('POTE')->default(0)->nullable();
            $table->integer('RA')->default(0)->nullable();
            $table->integer('RCA')->default(0)->nullable();
            $table->integer('RL')->default(0)->nullable();
            $table->integer('TARJETAS DE COMPUTADORA')->default(0)->nullable();
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
        Schema::dropIfExists('stock');
    }
}
