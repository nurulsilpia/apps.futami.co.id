<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblTimeReparationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_time_reparation', function (Blueprint $table) {
            $table->integer('id_time_reparation', true);
            $table->integer('id_product');
            $table->dateTime('start');
            $table->dateTime('stop');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_time_reparation');
    }
}
