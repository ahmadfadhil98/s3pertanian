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
            $table->string('kode_proses_disertasi');
            $table->unsignedBigInteger('disertasi_id');
            $table->text('link/upload');
            $table->timestamps();

            $table->foreign('proses_disertasi_id')->references('id')->on('proses_disertasis');
            $table->foreign('disertasi_id')->references('id')->on('disertasis');
            $table->unique(['proses_disertasi_id', 'kode_proses_disertasi']);
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
