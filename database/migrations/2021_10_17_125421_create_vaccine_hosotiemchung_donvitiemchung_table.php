<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineHosotiemchungDonvitiemchungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_hosotiemchung_donvitiemchung', function (Blueprint $table) {
            $table->increments('idVacHoSoDonVi');
            $table->dateTime('ngay_gio'); 
            $table->integer('mui_so')->unsigned();
            $table->integer('idvaccine')->unsigned();
            $table->foreign('idvaccine')->references('idvaccine')->on('vaccine')
            ->onDelete('cascade');
            $table->integer('idhosoBN')->unsigned();
            $table->foreign('idhosoBN')->references('idhosoBN')->on('hosotiemchung')
            ->onDelete('cascade');
            $table->integer('iddonvitiem')->unsigned();
            $table->foreign('iddonvitiem')->references('iddonvitiem')->on('donvitiemchung');
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
        Schema::dropIfExists('vaccine_hosotiemchung_donvitiemchung');
    }
}
