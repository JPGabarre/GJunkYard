<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipusVehiclesPecesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipus_vehicles_peces', function (Blueprint $table) {
            $table->bigInteger('id_tipus_vehicle')->unsigned()->index();
            $table->bigInteger('id_pece')->unsigned()->index();
            $table->timestamps();
            $table->foreign('id_tipus_vehicle')->references('id')->on('tipus_vehicles')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('id_pece')->references('id')->on('peces')
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipus_vehicles_peces');
    }
}
