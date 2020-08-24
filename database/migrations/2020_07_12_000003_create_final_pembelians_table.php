<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinalPembeliansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('final_pembelians', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pemesanan_id')->unsigned();
            $table->integer('harga');
            $table->integer('jumlah');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('pemesanan_id')
                ->on('pembelian')->references('id')
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
        Schema::dropIfExists('final_pembelians');
    }
}
