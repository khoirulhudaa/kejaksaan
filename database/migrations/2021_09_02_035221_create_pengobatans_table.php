<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengobatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengobatans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->date('tgl');
            $table->string('nama_klinik');
            $table->string('alamat');
            $table->string('identitas')->nullable();
            $table->string('jumlah_pembantu')->nullable();
            $table->string('sumber_informasi')->nullable();
            $table->string('asal_mula')->nullable();
            $table->string('cara')->nullable();
            $table->string('nomor_ijin')->nullable();
            $table->string('tgl_ijin')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('kecamatan_id')->references('id')->on('kecamatans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengobatans');
    }
}
