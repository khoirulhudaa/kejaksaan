<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKorupsisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('korupsis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->unsignedSmallInteger('biodata_id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->string('locus');
            $table->string('pasal');
            $table->string('penyelidikan');
            $table->string('tgl_surat_kejaksaan')->nullable();
            $table->string('nomor_surat_kejaksaan')->nullable();
            $table->string('tgl_surat_polri')->nullable();
            $table->string('nomor_surat_polri')->nullable();
            $table->string('penuntutan');
            $table->string('eksekusi');
            $table->string('upaya');
            $table->string('keterangan');
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
        Schema::dropIfExists('korupsis');
    }
}
