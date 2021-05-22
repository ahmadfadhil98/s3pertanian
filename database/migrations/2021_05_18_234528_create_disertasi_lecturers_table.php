<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisertasiLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disertasi_lecturers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('disertasi_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->integer('approve');
            $table->timestamps();

            $table->foreign('disertasi_id')->references('id')->on('disertasis');
            $table->foreign('lecturer_id')->references('id')->on('lecturers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('disertasi_lecturers');
    }
}
