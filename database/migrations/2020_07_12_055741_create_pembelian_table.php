<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pembelian')->nullable();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('barang_id')->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->integer('total_pembelian')->unsigned();
            $table->timestamps();
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('barang_id')
                ->references('id')->on('barangs')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembelian');
    }
}
