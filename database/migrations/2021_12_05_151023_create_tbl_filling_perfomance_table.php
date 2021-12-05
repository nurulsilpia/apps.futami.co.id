<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblFillingPerfomanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_filling_perfomance', function (Blueprint $table) {
            $table->integer('id_filling_perfomance', true);
            $table->integer('id_product');
            $table->string('no_batch', 100);
            $table->dateTime('start_filling');
            $table->dateTime('stop_filling');
            $table->integer('counter_filling');
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
        Schema::dropIfExists('tbl_filling_perfomance');
    }
}
