<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBotolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('botols', function (Blueprint $table) {
            $table->id();
            $table->string("nama_botol", 50);
            $table->integer("jumlah_botol")->unsigned();
            $table->integer("min_stock");
            $table->integer("harga_penjualan")->unsigned();
            $table->integer("harga_reseller")->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('botols');
    }
}
