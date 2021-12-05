<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStartUpUtilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_start_up_utility', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_produksi');
            $table->dateTime('mulai');
            $table->dateTime('selesai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_start_up_utility');
    }
}
