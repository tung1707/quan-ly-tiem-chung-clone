<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoidanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoidan', function (Blueprint $table) {
            $table->increments('idnguoidan');
            $table->string('chung_minh_ND');
            $table->string('fullname');
            $table->date('birthday');
            $table->enum('gender',['male','female']);
            $table->string('city');
            $table->string('district');
            $table->string('wards');
            $table->string('address');
            $table->string('work');
            $table->string('Tien_su_benh_an');
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
        Schema::dropIfExists('nguoidan');
    }
}
