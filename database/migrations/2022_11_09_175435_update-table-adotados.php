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
        Schema::table('adotados', function(Blueprint $table){
            $table->dateTime('data_visita_um')->nullable()->change();
            $table->dateTime('data_visita_dois')->nullable()->change();
            $table->dateTime('data_visita_tres')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
