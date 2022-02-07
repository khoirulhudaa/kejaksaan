<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengamananSumberDayasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengamanan_sumber_dayas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->date('tgl');
            $table->string('sumber_informasi');
            $table->string('isi_informasi');
            $table->string('opsin_lid')->nullable();
            $table->string('opsin_pam')->nullable();
            $table->string('opsin_gal')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->string('tgl_surat')->nullable();
            $table->string('hasil')->nullable();
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
        Schema::dropIfExists('pengamanan_sumber_dayas');
    }
}
