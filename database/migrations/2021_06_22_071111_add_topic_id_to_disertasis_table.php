<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTopicIdToDisertasisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disertasis', function (Blueprint $table) {
            $table->unsignedBigInteger('topic_id')
                    ->after('student_id')
                    ->nullable();

            $table->foreign('topic_id')->references('id')->on('disertasi_topics');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('disertasis', function (Blueprint $table) {
            $table->dropColumn('topic_id');
        });
    }
}
