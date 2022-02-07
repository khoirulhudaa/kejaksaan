<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengawasanKeagamaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengawasan_keagamaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->date('tgl');
            $table->string('nama');
            $table->string('pimpinan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('jumlah_pengikut')->nullable();
            $table->string('nomor_pendaftaran')->nullable();
            $table->string('tgl_pendaftaran')->nullable();
            $table->string('nomor_badan')->nullable();
            $table->string('tgl_badan')->nullable();
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
        Schema::dropIfExists('pengawasan_keagamaans');
    }
}
