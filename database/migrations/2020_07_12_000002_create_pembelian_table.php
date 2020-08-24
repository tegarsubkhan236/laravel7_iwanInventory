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
            $table->bigInteger('id_barang')->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->integer('harga');
            $table->integer('total_pembelian')->unsigned();
            $table->string('status');
            $table->timestamps();

            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_barang')
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
