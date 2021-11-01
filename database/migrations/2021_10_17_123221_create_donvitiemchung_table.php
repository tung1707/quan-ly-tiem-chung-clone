<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonvitiemchungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donvitiemchung', function (Blueprint $table) {
            $table->increments('iddonvitiem');
            $table->string('tendonvi');
            $table->string('city');
            $table->string('district');
            $table->string('wards');
            $table->string('address');
            $table->integer('id_users')->unsigned();
            $table->foreign('id_users')->references('id_users')->on('users')
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
        Schema::dropIfExists('donvitiemchung');
    }
}
