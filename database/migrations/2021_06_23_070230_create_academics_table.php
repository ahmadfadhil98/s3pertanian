<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAcademicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proses_disertasi_id');
            $table->integer('type');
            $table->integer('no');
            $table->unsignedBigInteger('disertasi_id');
            $table->text('link_upload');
            $table->text('path')->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('mark')->nullable();
            $table->timestamps();

            $table->foreign('proses_disertasi_id')->references('id')->on('proses_disertasis');
            $table->foreign('disertasi_id')->references('id')->on('disertasis');
            $table->unique(['proses_disertasi_id', 'type','no']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academics');
    }
}
