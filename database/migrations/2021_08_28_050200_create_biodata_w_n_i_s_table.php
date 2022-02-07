<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataWNISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_w_n_i_s', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('nik');
            $table->string('name');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->unsignedSmallInteger('bangsa_id')->nullable();
            $table->string('kewarganegaraan')->default('WNI');
            $table->string('kecamatan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedSmallInteger('agama_id')->nullable();
            $table->unsignedSmallInteger('pendidikan_id')->nullable();
            $table->unsignedSmallInteger('pekerjaan_id')->nullable();
            $table->string('alamat_kantor')->nullable();
            $table->unsignedSmallInteger('perkawinan_id')->nullable();
            $table->string('legitimasi_perkawinan')->nullable();
            $table->string('tempat_perkawinan')->nullable();
            $table->date('tanggal_perkawinan')->nullable();
            $table->timestamps();

            $table->foreign('bangsa_id')->references('id')->on('suku_bangsas')->onDelete('cascade');
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
        Schema::dropIfExists('biodata_w_n_i_s');
    }
}
