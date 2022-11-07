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
        Schema::create('adotantes', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('rua');
            $table->string('numero');
            $table->string('bairro');            
            $table->string('CEP');            
            $table->string('cidade');            
            $table->string('estado');            
            $table->string('telefone');            
            $table->string('email');            
            $table->string('casa_ap');            
            $table->string('viagem');            
            $table->string('renda');            
            $table->string('adaptacao');            
            $table->string('hobbies');            
            $table->string('planejamento');            
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
        Schema::dropIfExists('adotantes');
    }
};
