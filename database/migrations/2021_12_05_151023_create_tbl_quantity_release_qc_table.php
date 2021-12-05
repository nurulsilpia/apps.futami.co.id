<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblQuantityReleaseQcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_quantity_release_qc', function (Blueprint $table) {
            $table->integer('id_quantity_release_qc', true);
            $table->integer('id_product');
            $table->integer('reject_defect_inspeksi');
            $table->integer('reject_defect_inspeksi_hci');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_quantity_release_qc');
    }
}
