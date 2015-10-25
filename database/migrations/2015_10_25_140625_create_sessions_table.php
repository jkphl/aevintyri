<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');

            $table->integer('day_id');
            $table->integer('room_id');
            $table->string('name', 255);
            $table->smallInteger('level');
            $table->longText('requirements')->nullable();
            $table->time('start_time');
            $table->time('end_time');
            $table->string('hashtag', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('abstract')->nullable();
            $table->string('image', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sessions');
    }
}
