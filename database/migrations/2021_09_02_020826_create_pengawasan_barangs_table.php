<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengawasanBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengawasan_barangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kecamatan_id');
            $table->date('tgl');
            $table->unsignedSmallInteger('barang_id');
            $table->string('tgl_penerbitan');
            $table->string('penulis')->nullable();
            $table->string('judul')->nullable();
            $table->string('hasil')->nullable();
            $table->string('tindak_lanjut')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('t_i_k_barangs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengawasan_barangs');
    }
}
