<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTIKBarangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('t_i_k_barangs', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nomor')->nullable();
            $table->string('nama')->nullable();
            $table->string('penerbit')->nullable();
            $table->string('pengarang')->nullable();
            $table->date('waktu')->nullable();
            $table->string('daerah')->nullable();
            $table->string('pencetak')->nullable();
            $table->string('nama_pimpinan')->nullable();
            $table->string('alamat_penerbit')->nullable();
            $table->string('alamat_percetakan')->nullable();
            $table->string('jumlah_oplah')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kasus')->nullable();
            $table->string('background')->nullable();
            $table->string('tindakan')->nullable();
            $table->string('tindakan_kejaksaan')->nullable();
            $table->string('tindakan_kepolisian')->nullable();
            $table->string('tindakan_pengadilan')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('t_i_k_barangs');
    }
}
