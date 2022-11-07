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
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->string('nome');

            $table->string('especie');

            $table->string('porte');

            $table->string('adaptacao');

            $table->string('temperamento');

            $table->string('idade');

            $table->string('sexo');

            $table->string('tamanho_pelo');

            $table->string('cor_pelo');

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
        Schema::dropIfExists('pets');
    }
};
