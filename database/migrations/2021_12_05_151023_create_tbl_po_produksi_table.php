<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPoProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_po_produksi', function (Blueprint $table) {
            $table->integer('id');
            $table->integer('id_varian');
            $table->integer('jumlah_po');
            $table->string('status_po', 100);
            $table->string('standar_bph', 100);
            $table->text('note');
            $table->dateTime('mulai_produksi');
            $table->dateTime('selesai_produksi');
            $table->timestamp('tanggal_dibuat')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_po_produksi');
    }
}
