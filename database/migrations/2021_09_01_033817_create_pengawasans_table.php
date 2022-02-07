<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengawasansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengawasans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->unsignedSmallInteger('biodata_id');
            $table->string('tk')->nullable();
            $table->unsignedSmallInteger('kecamatan_id');
            $table->string('locus')->nullable();
            $table->string('mhs')->nullable();
            $table->string('peneliti')->nullable();
            $table->string('keluarga')->nullable();
            $table->string('rohaniawan')->nullable();
            $table->string('pendatang_ilegal')->nullable();
            $table->string('usaha')->nullable();
            $table->string('sosbud')->nullable();
            $table->string('wisata')->nullable();
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
        Schema::dropIfExists('pengawasans');
    }
}
