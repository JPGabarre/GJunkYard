<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTreballsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('treballs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_tipus_treball')->unsigned()->index();
            $table->bigInteger('id_rol')->unsigned()->index();
            $table->string('resum');
            $table->text('descripcio');
            $table->integer('urgencia')->nullable();
            $table->timestamps();
            $table->foreign('id_tipus_treball')->references('id')->on('tipus_treballs');
            $table->foreign('id_rol')->references('id')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('treballs');
    }
}
