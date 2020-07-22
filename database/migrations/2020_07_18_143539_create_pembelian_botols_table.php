<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembelianBotolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembelian_botols', function (Blueprint $table) {
            $table->id();
            $table->date('tgl_pembelian')->nullable();
            $table->bigInteger('supplier_id')->unsigned();
            $table->bigInteger('botol_id')->unsigned();
            $table->integer('jumlah')->unsigned();
            $table->integer('total_pembelian')->unsigned();
            $table->timestamps();
            $table->foreign('supplier_id')
                ->references('id')->on('suppliers')
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
        Schema::dropIfExists('pembelian_botols');
    }
}
