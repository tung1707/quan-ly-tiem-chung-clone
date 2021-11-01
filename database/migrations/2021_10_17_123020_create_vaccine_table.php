<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine', function (Blueprint $table) {
            $table->increments('idvaccine');
            $table->string('name_vaccine');
            $table->string('country');
            $table->string('company');
            $table->string('type')->default('mRNA');
            $table->string('object');
            $table->integer('somui')->unsigned();
            $table->integer('distance')->unsigned();
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
        Schema::dropIfExists('vaccine');
    }
}
