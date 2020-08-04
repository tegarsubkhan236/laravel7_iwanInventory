<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengirimenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengirimen', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('pelanggan_id')->unsigned();
            $table->bigInteger('barang_id')->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->integer('total_penjualan')->unsigned();
            $table->timestamps();
            $table->foreign('barang_id')
                ->references('id')->on('barangs')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pelanggan_id')
                ->references('id')->on('pelanggans')
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
        Schema::dropIfExists('pengirimen');
    }
}
