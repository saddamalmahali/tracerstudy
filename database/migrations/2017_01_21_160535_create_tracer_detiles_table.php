<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTracerDetilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tracer_detile', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_tracer')->length(10);
            $table->enum('kode_form', ['f3', 'f4', 'f5', 'f6', 'f7', 'f7a', 'f8', 'f9', 'f10', 'f11', 'f12', 'f13', 'f14', 'f15', 'f16', 'f17a', 'f17b']);
            $table->string('value')->nullabel();
            $table->integer('option')->length(3)->nullabel();
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
        Schema::dropIfExists('tracer_detile');
    }
}
