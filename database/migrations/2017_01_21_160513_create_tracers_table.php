<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_pt')->length(20);
            $table->string('kode_prodi')->length(20);
            $table->string('nama_alumni')->length(50);
            $table->string('no_hp')->length(50);
            $table->string('email')->length(50);
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
        Schema::dropIfExists('tracer');
    }
}
