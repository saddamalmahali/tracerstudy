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
            $table->enum('kode_form', ['f3', 'f4', 'f5', 'f6', 'f7', 'f7a', 'f8', 'f9', 'f10', 'f11', 'f12', 'f13_1', 'f13_2', 'f13_3', 'f14', 'f15', 'f16', 'f17a_1','f17a_2','f17a_3','f17a_4','f17a_5','f17a_6','f17a_7','f17a_8','f17a_9','f17a_10','f17a_11','f17a_12','f17a_13','f17a_14','f17a_15','f17a_16','f17a_17','f17a_18','f17a_19','f17a_20','f17a_21','f17a_22','f17a_23','f17a_24','f17a_25','f17a_26','f17a_27','f17a_28','f17a_29','f17a_30', 'f17b_1','f17b_2','f17b_3','f17b_4','f17b_5','f17b_6','f17b_7','f17b_8','f17b_9','f17b_10','f17b_11','f17b_12','f17b_13','f17b_14','f17b_15','f17b_16','f17b_17','f17b_18','f17b_19','f17b_20','f17b_21','f17b_22','f17b_23','f17b_24','f17b_25','f17b_26','f17b_27','f17b_28','f17b_29','f17b_30']);
            $table->string('value')->nullable();
            $table->string('option')->nullable();
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
