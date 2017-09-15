<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGerejasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gereja', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama');
            $table->integer('tipe_id');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('kota');
            $table->string('alamat');
            $table->timestamps();
            $table->foreign('tipe_id')->references('id')->on('tipe_gereja');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gerejas');
    }
}
