<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenterSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presenter_sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('presenter_id');
            $table->integer('session_id');

            $table->unique(['presenter_id', 'session_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presenter_sessions');
    }
}
