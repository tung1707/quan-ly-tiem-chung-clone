<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDktiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dktiem', function (Blueprint $table) {
            $table->increments('iddktiem');
            $table->date('Ngay_Tiem');
            $table->integer('idnguoidan')->unsigned();
            $table->foreign('idnguoidan')->references('idnguoidan')->on('nguoidan')
            ->onDelete('cascade');
            $table->integer('iddonvitiem')->unsigned();
            $table->foreign('iddonvitiem')->references('iddonvitiem')->on('donvitiemchung')
            ->onDelete('cascade');
            // $table->integer('idkehoachtiem')->unsigned();
            // $table->foreign('idkehoachtiem')->references('idkehoachtiem')->on('kehoachtiem');
            $table->integer('idvaccine')->unsigned();
            $table->foreign('idvaccine')->references('idvaccine')->on('vaccine')->onDelete('cascade');
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
        Schema::dropIfExists('dktiem');
    }
}
