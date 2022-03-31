<?php

use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_evento');
            $table->timestamps();
        });

        App\Evento::insert([
            ['nombre_evento' => 'Entrada', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['nombre_evento' => 'Salida', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['nombre_evento' => 'Permiso', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
            ['nombre_evento' => 'Hora extra', 'created_at'=> Carbon::now(), 'updated_at'=> Carbon::now()],
   
            
            
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
