<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CearTablaCalificaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificaciones', function (Blueprint $table) {
            $table->charset = 'utf8';
            $table->collation = 'utf8_spanish_ci';
            $table->bigIncrements('id');
           $table->string('id_ingreso',30);
           $table->string('periodoescolar',15);
           $table->string('lapso',15);
           $table->string('anoest',15);
           $table->string('seccion',5);
           $table->double('castellano', 8, 5)->nullable();
           $table->double('ingles', 8, 5)->nullable();
           $table->double('matematica', 8, 5)->nullable();
           $table->double('ed_fisica', 8, 5)->nullable();
           $table->double('art_patrimonio', 8, 5)->nullable();
           $table->double('cs_naturales', 8, 5)->nullable();
           $table->double('fisica', 8, 5)->nullable();
           $table->double('quimica', 8, 5)->nullable();
           $table->double('biologia', 8, 5)->nullable();
           $table->double('cs_tierra', 8, 5)->nullable();
           $table->double('ghc', 8, 5)->nullable();
           $table->double('fsn', 8, 5)->nullable();
           $table->double('orientacion', 8, 5)->nullable();
           $table->string('gcrp',15)->nullable();
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
        Schema::dropIfExists('calificaciones');
    }
}
