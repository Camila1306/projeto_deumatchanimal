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
        Schema::create('animais', function (Blueprint $table) {
            $table->id();
            $table->string('nome');

            $table->unsignedBigInteger('especie_id');
            $table->foreign('especie_id')->references('id')->on('especies');

            $table->string('porte');

            $table->unsignedBigInteger('adaptacao_id');
            $table->foreign('adaptacao_id')->references('id')->on('adaptacoes');

            $table->unsignedBigInteger('temperamento_id');
            $table->foreign('temperamento_id')->references('id')->on('temperamentos');

            $table->string('idade');

            $table->string('sexo');

            $table->unsignedBigInteger('pelagem_id');
            $table->foreign('pelagem_id')->references('id')->on('pelagens');

            $table->string('historia');
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
        Schema::dropIfExists('animais');
    }
};
