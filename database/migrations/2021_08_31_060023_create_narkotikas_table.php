<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNarkotikasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narkotikas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl');
            $table->unsignedSmallInteger('biodata_id');
            $table->unsignedSmallInteger('kecamatan_id');
            $table->string('locus');
            $table->string('pasal');
            $table->string('tgl_surat_pra_penuntutan')->nullable();
            $table->string('nomor_surat_pra_penuntutan')->nullable();
            $table->string('tgl_surat_penuntutan')->nullable();
            $table->string('nomor_surat_penuntutan')->nullable();
            $table->string('eksekusi');
            $table->string('upaya');
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
        Schema::dropIfExists('narkotikas');
    }
}
