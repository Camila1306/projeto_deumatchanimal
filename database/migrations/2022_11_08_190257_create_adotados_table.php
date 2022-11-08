<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adotados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->foreign('pet_id')->references('id')->on('pets');
            $table->unsignedBigInteger('adotante_id');
            $table->foreign('adotante_id')->references('id')->on('adotantes');
            $table->dateTime('datahora');
            $table->text('obs');
            $table->dateTime('data_visita_um');
            $table->dateTime('data_visita_dois');
            $table->dateTime('data_visita_tres');

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
        Schema::dropIfExists('adotados');
    }
};