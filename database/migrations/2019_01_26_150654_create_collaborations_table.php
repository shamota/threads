<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollaborationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('thread_id');
            $table->unsignedInteger('reply_id');
            $table->softDeletes();

            $table->foreign('thread_id')->references('id')->on('threads');
            $table->foreign('reply_id')->references('id')->on('replies');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('collaborations', function (Blueprint $table) {
            $table->dropForeign(['thread_id']);
            $table->dropForeign(['reply_id']);
            $table->dropIfExists('collaborations');

        });
    }
}
