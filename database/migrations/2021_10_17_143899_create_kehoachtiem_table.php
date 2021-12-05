<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKehoachtiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kehoachtiem', function (Blueprint $table) {
             //Co so y te
             $table->increments('idkehoachtiem');
             $table->date('Ngay_Tiem');
             $table->time('gio_Tiem')->default("00:00:00");
             $table->integer('iddonvitiem')->unsigned();
             $table->foreign('iddonvitiem')->references('iddonvitiem')->on('donvitiemchung')
             ->onDelete('cascade');
             $table->integer('idnguoidan')->unsigned();
             $table->foreign('idnguoidan')->references('idnguoidan')->on('nguoidan')
             ->onDelete('cascade');
            $table->integer('iddktiem')->unsigned();
            $table->foreign('iddktiem')->references('iddktiem')->on('dktiem')
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
        Schema::dropIfExists('kehoachtiem');
    }
}
