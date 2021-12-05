<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQuantityProductionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quantity_production', function (Blueprint $table) {
            $table->integer('id_quantity_production', true);
            $table->integer('id_product');
            $table->integer('reject_defect');
            $table->integer('sample');
            $table->integer('reject_defect_hci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_quantity_production');
    }
}
