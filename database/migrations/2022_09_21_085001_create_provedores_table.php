<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvedoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provedores', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre',10);
            $table->string('Apellido_p',10);
            $table->string('Apellido_m',10);
            $table->string('Articulo',10);
            $table->float('Precio',10);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('provedores');
    }
}
