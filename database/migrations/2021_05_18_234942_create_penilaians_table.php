<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penilaians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('academic_id');
            $table->unsignedBigInteger('lecturer_id');
            $table->double('score');
            $table->string('grade');
            $table->text('revisi');
            $table->timestamps();

            $table->foreign('academic_id')->references('id')->on('proses_disertasis');
            $table->foreign('lecturer_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penilaians');
    }
}
