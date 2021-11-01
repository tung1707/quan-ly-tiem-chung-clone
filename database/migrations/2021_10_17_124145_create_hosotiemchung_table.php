<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosotiemchungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hosotiemchung', function (Blueprint $table) {
            $table->increments('idhosoBN');
            $table->integer('Tso_mui_tiem')->default(0)->unsigned();
            $table->integer('idnguoidan')->unsigned();
            $table->foreign('idnguoidan')->references('idnguoidan')->on('nguoidan')
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
        Schema::dropIfExists('hosotiemchung');
    }
}
