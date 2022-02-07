<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePencegahansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pencegahans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->unsignedSmallInteger('biodata_id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->string('locus');
            $table->string('nomor_pencegahan')->nullable();
            $table->string('tgl_pencegahan')->nullable();
            $table->string('pasal')->nullable();
            $table->string('nomor_kepja')->nullable();
            $table->string('tgl_kepja')->nullable();
            $table->string('tgl_mulai')->nullable();
            $table->string('tgl_akhir')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata_w_n_i_s')->onDelete('cascade');
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
        Schema::dropIfExists('pencegahans');
    }
}
