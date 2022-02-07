<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembinaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembinaans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->date('tgl');
            $table->string('direktorat');
            $table->string('peserta')->nullable();
            $table->string('waktu')->nullable();
            $table->string('tempat')->nullable();
            $table->string('materi')->nullable();
            $table->string('jumlah_peserta')->nullable();
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
        Schema::dropIfExists('pembinaans');
    }
}
