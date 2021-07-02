<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarkingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('markings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lecturer_id');
            $table->unsignedBigInteger('academic_id');
            $table->double('score');
            $table->string('grade');
            $table->text('keterangan');
            $table->timestamps();

            $table->foreign('lecturer_id')->references('id')->on('lecturers');
            $table->foreign('academic_id')->references('id')->on('academics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('markings');
    }
}
