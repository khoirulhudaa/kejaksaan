<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsingPidanasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asing_pidanas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->unsignedSmallInteger('biodata_id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->string('locus');
            $table->string('tindak_pidana');
            $table->string('tahapan_dik')->nullable();
            $table->string('tahapan_pratut')->nullable();
            $table->string('tahapan_tut')->nullable();
            $table->string('tahapan_eksekusi')->nullable();
            $table->string('lama_pidana')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('biodata_id')->references('id')->on('biodata_w_n_a_s')->onDelete('cascade');
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
        Schema::dropIfExists('asing_pidanas');
    }
}
