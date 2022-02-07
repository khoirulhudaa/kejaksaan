<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBiodataWNASTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biodata_w_n_a_s', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('pasport')->nullable();
            $table->string('name');
            $table->unsignedSmallInteger('country_id')->nullable();
            $table->timestamps();

            $table->foreign('country_id')->references('id')->on('negaras')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biodata_w_n_a_s');
    }
}
