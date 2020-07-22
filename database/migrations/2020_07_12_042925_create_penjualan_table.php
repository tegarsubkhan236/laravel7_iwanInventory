<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenjualanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('barang_id')->unsigned();
            $table->bigInteger('botol_id')->unsigned()->nullable();
            $table->integer('jumlah')->unsigned();
            $table->integer('total_penjualan')->unsigned();
            $table->timestamps();
            $table->foreign('pelanggan_id')
                ->references('id')->on('pelanggans')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('barang_id')
                ->references('id')->on('barangs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('botol_id')
                ->references('id')->on('botols')
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
        Schema::dropIfExists('penjualan');
    }
}
