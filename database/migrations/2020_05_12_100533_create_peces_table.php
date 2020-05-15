<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peces', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('referencia')->unique();
            $table->string('nom');
            $table->integer('quantitat');
            $table->double('preu');
            $table->bigInteger('id_vehicle')->unsigned()->index();
            $table->foreign('id_vehicle')->references('id')->on('vehicles')
            ->onDelete('cascade');
            
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
        Schema::dropIfExists('peces');
    }
}
