<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblDowntimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_downtime', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('id_produksi');
            $table->integer('id_jenis_downtime');
            $table->integer('id_unit_downtime');
            $table->text('root_cause');
            $table->dateTime('mulai_downtime');
            $table->dateTime('selesai_downtime');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_downtime');
    }
}
