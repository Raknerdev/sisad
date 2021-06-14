<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportes', function (Blueprint $table) {
            // En Revision
            $table->id();
            $table->date('fecha');
            $table->string('nombre');
            $table->float('total');
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
        Schema::dropIfExists('reportes');
    }
}
