<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bastidor')->unique();
            $table->string('combustible');
            $table->integer('portes');
            $table->integer('places');
            $table->string('any_matriculacio');
            $table->bigInteger('id_tipus_vehicle')->unsigned()->index();
            $table->foreign('id_tipus_vehicle')->references('id')->on('tipus_vehicles');
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
        Schema::dropIfExists('vehicles');
    }
}
