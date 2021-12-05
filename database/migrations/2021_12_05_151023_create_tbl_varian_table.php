<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblVarianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_varian', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_customer');
            $table->string('nama_variant', 100);
            $table->string('kode_variant', 100);
            $table->integer('ukuran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_varian');
    }
}
