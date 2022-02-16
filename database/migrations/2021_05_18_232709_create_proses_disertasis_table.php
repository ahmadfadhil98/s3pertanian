<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProsesDisertasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proses_disertasis', function (Blueprint $table) {
            $table->id();
            $table->string('kode');
            $table->string('name');
            $table->foreignId('kurikulum_id')->references('id')->on('kurikulums');
            $table->integer('file_lots')->nullable();
            $table->integer('link_lots')->nullable();
            $table->unsignedBigInteger('terms_id')->nullable();
            $table->timestamps();

            $table->foreign('terms_id')->references('id')->on('proses_disertasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('proses_disertasis');
    }
}
