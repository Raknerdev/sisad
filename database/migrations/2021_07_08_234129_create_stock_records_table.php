<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStockRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_records', function (Blueprint $table) {
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
        Schema::dropIfExists('stock_records');
    }
    // <tr><th>{{$prod1}}</th><th>{{$reg->$prod1}}</th></tr>
    // <tr><th>{{$prod2}}</th><th>{{$reg->$prod2}}</th></tr>
    // <tr><th>{{$prod3}}</th><th>{{$reg->$prod3}}</th></tr>
    // <tr><th>{{$prod4}}</th><th>{{$reg->$prod4}}</th></tr>
    // <tr><th>{{$prod5}}</th><th>{{$reg->$prod5}}</th></tr>
    // <tr><th>{{$prod6}}</th><th>{{$reg->$prod6}}</th></tr>
    // <tr><th>{{$prod7}}</th><th>{{$reg->$prod7}}</th></tr>
    // <tr><th>{{$prod8}}</th><th>{{$reg->$prod8}}</th></tr>
    // <tr><th>{{$prod9}}</th><th>{{$reg->$prod9}}</th></tr>
    // <tr><th>{{$prod10}}</th><th>{{$reg->$prod10}}</th></tr>
    // <tr><th>{{$prod11}}</th><th>{{$reg->$prod11}}</th></tr>
    // <tr><th>{{$prod12}}</th><th>{{$reg->$prod12}}</th></tr>
    // <tr><th>{{$prod13}}</th><th>{{$reg->$prod13}}</th></tr>
    // <tr><th>{{$prod14}}</th><th>{{$reg->$prod14}}</th></tr>
    // <tr><th>{{$prod15}}</th><th>{{$reg->$prod15}}</th></tr>
    // <tr><th>{{$prod16}}</th><th>{{$reg->$prod16}}</th></tr>
    // <tr><th>{{$prod17}}</th><th>{{$reg->$prod17}}</th></tr>
    // <tr><th>{{$prod18}}</th><th>{{$reg->$prod18}}</th></tr>
    // <tr><th>{{$prod19}}</th><th>{{$reg->$prod19}}</th></tr>
    // <tr><th>{{$prod20}}</th><th>{{$reg->$prod20}}</th></tr>
    // <tr><th>{{$prod21}}</th><th>{{$reg->$prod21}}</th></tr>
    // <tr><th>{{$prod22}}</th><th>{{$reg->$prod22}}</th></tr>
    // <tr><th>{{$prod23}}</th><th>{{$reg->$prod23}}</th></tr>

    // <tr><th>ACERO CORTO</th><th>{{$reg->('ACERO CORTO')}}kg</th></tr>
    // <tr><th>ACERO LARGO</th><th>{{$reg->('ACERO LARGO')}}kg</th></tr>
    // <tr><th>ALUMINIO</th><th>{{$reg->('ALUMINIO')}}kg</th></tr>
    // <tr><th>BATERIAS</th><th>{{$reg->('BATERIAS')}}kg</th></tr>
    // <tr><th>CALAMINA</th><th>{{$reg->('CALAMINA')}}kg</th></tr>
    // <tr><th>CHATARRA</th><th>{{$reg->('CHATARRA')}}kg</th></tr>
    // <tr><th>CORTO PESADO</th><th>{{$reg->('CORTO PESADO')}}kg</th></tr>
    // <tr><th>Duro</th><th>{{$reg->('Duro')}}kg</th></tr>
    // <tr><th>LARGO PESADO</th><th>{{$reg->('LARGO PESADO')}}kg</th></tr>
    // <tr><th>LATA</th><th>{{$reg->('LATA')}}kg</th></tr>
    // <tr><th>LATON</th><th>{{$reg->('LATON')}}kg</th></tr>
    // <tr><th>MARGINAL</th><th>{{$reg->('MARGINAL')}}kg</th></tr>
    // <tr><th>MIXTO</th><th>{{$reg->('MIXTO')}}kg</th></tr>
    // <tr><th>MOTOR DE NEVERA</th><th>{{$reg->('MOTOR DE NEVERA')}}kg</th></tr>
    // <tr><th>PERFIL</th><th>{{$reg->('PERFIL')}}kg</th></tr>
    // <tr><th>PLASTICO</th><th>{{$reg->('PLASTICO')}}kg</th></tr>
    // <tr><th>PLOMO CHATARRA</th><th>{{$reg->('PLOMO CHATARRA')}}kg</th></tr>
    // <tr><th>PLOMO LINGOTE</th><th>{{$reg->('PLOMO LINGOTE')}}kg</th></tr>
    // <tr><th>POTE</th><th>{{$reg->('POTE')}}kg</th></tr>
    // <tr><th>RA</th><th>{{$reg->('RA')}}kg</th></tr>
    // <tr><th>RCA</th><th>{{$reg->('RCA')}}kg</th></tr>
    // <tr><th>RL</th><th>{{$reg->('RL')}}kg</th></tr>
    // <tr><th>TARJETAS DE COMPUTADORA</th><th>{{$reg->('TARJETAS DE COMPUTADORA')}}kg</th></tr>

    //$prod1 = "ACERO CORTO";
    //$prod2 = "ACERO LARGO";
    //$prod3 = "ALUMINIO";
    //$prod4 = "BATERIAS";
    //$prod5 = "CALAMINA";
    //$prod6 = "CHATARRA";
    //$prod7 = "CORTO PESADO";
    //$prod8 = "Duro";
    //$prod9 = "LARGO PESADO";
    //$prod10 = "LATA";
    //$prod11 = "LATON";
    //$prod12 = "MARGINAL";
    //$prod13 = "MIXTO";
    //$prod14 = "MOTOR DE NEVERA";
    //$prod15 = "PERFIL";
    //$prod16 = "PLASTICO";
    //$prod17 = "PLOMO CHATARRA";
    //$prod18 = "PLOMO LINGOTE";
    //$prod19 = "POTE";
    //$prod20 = "RA";
    //$prod21 = "RCA";
    //$prod22 = "RL";
    //$prod23 = "TARJETAS DE COMPUTADORA";
}
