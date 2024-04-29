<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('formularios', function (Blueprint $table) {
            $table->id();
            //Entidad
            $table->string('hoja_ruta');
            $table->string('nombre_aerodromo');
            $table->string('nombre_solicitante');
            $table->string('ci', 20);
            $table->string('correo_electronico');
            $table->string('telefono', 20);
            $table->string('departamento');
            $table->string('municipio');
            //Coordenadas
            //8
            $table->string('designador_umbral_menor_elevacion');
            //8.1
            $table->integer('du_menor_latitud_sur_grados');
            $table->string('du_menor_latitud_sur_minutos');
            $table->decimal('du_menor_latitud_sur_segundos',10,2);
            //8.2
            $table->integer('du_menor_longitud_oeste_grados');
            $table->string('du_menor_longitud_oeste_minutos');
            $table->decimal('du_menor_longitud_oeste_segundos', 10, 2);
            //9
            $table->string('designador_umbral_mayor_elevacion');
            //9.1
            $table->integer('du_mayor_latitud_sur_grados');
            $table->string('du_mayor_latitud_sur_minutos');
            $table->decimal('du_mayor_latitud_sur_segundos', 10, 2);
            //9.2
            $table->integer('du_mayor_longitud_oeste_grados');
            $table->string('du_mayor_longitud_oeste_minutos');
            $table->decimal('du_mayor_longitud_oeste_segundos', 10, 2);
            //10
            $table->decimal('elevacion_aerodromo', 10, 2)->nullable();
            //10.1
            $table->integer('ea_latitud_sur_grados');
            $table->string('ea_latitud_sur_minutos');
            $table->decimal('ea_latitud_sur_segundos', 10, 2);
            //10.2
            $table->integer('ea_longitud_oeste_grados');
            $table->string('ea_longitud_oeste_minutos');
            $table->decimal('ea_longitud_oeste_segundos', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formularios');
    }
};
