<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineDonvitiemchungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_donvitiemchung', function (Blueprint $table) {
            $table->increments('idvaccine_donvitiemchung');
            $table->integer('idvaccine')->unsigned();
            $table->foreign('idvaccine')->references('idvaccine')->on('vaccine')
            ->onDelete('cascade');
            $table->integer('soluong')->unsigned();
            $table->integer('iddonvitiem')->unsigned();
            $table->foreign('iddonvitiem')->references('iddonvitiem')->on('donvitiemchung')
            ->onDelete('cascade');
            // $table->date('Ngay_Nhan');
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
        Schema::dropIfExists('vaccine_donvitiemchung');
    }
}
