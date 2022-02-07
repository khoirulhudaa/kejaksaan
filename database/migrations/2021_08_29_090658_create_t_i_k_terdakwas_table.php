<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTIKTerdakwasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_i_k_terdakwas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomor')->nullable();
            $table->string('nama')->nullable();
            $table->string('panggilan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->unsignedSmallInteger('bangsa_id')->nullable();
            $table->unsignedSmallInteger('kewarganegaraan_id')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('phone')->nullable();
            $table->string('pasport')->nullable();
            $table->unsignedSmallInteger('agama_id')->nullable();
            $table->unsignedSmallInteger('pekerjaan_id');
            $table->string('alamat_kantor');
            $table->unsignedSmallInteger('perkawinan_id');
            $table->string('kepartaian')->nullable();
            $table->unsignedSmallInteger('pendidikan_id');
            $table->string('photo')->nullable();
            $table->string('kasus')->nullable();
            $table->string('background')->nullable();
            $table->string('no_skpp')->nullable();
            $table->string('tgl_skpp')->nullable();
            $table->string('putusan_pengadilan_pn')->nullable();
            $table->string('putusan_pengadilan_pt')->nullable();
            $table->string('putusan_pengadilan_ma')->nullable();
            $table->string('nama_orangtua')->nullable();
            $table->string('nama_kawan')->nullable();
            $table->string('lain')->nullable();
            $table->timestamps();

            $table->foreign('bangsa_id')->references('id')->on('suku_bangsas')->onDelete('cascade');
            $table->foreign('kewarganegaraan_id')->references('id')->on('warga_negaras')->onDelete('cascade');
            $table->foreign('agama_id')->references('id')->on('agamas')->onDelete('cascade');
            $table->foreign('pendidikan_id')->references('id')->on('pendidikans')->onDelete('cascade');
            $table->foreign('pekerjaan_id')->references('id')->on('pekerjaans')->onDelete('cascade');
            $table->foreign('perkawinan_id')->references('id')->on('status_perkawinans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('t_i_k_terdakwas');
    }
}
