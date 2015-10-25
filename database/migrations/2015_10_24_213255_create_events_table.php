<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->boolean('deleted');
            $table->integer('organizer');
            $table->integer('series')->nullable();
            $table->string('name', 255);
            $table->string('image', 255)->nullable();
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->string('email', 255)->nullable();
            $table->string('phone', 255)->nullable();
            $table->string('fax', 255)->nullable();
            $table->string('cell', 255)->nullable();
            $table->string('web', 255)->nullable();
            $table->string('facebook', 255)->nullable();
            $table->string('twitter', 255)->nullable();
            $table->string('xing', 255)->nullable();
            $table->string('gplus', 255)->nullable();
            $table->string('hashtag', 255)->nullable();
            $table->longText('description')->nullable();
            $table->longText('abstract')->nullable();
            $table->string('type', 255);
            $table->string('facebook_event', 255)->nullable();
            $table->string('xing_event', 255)->nullable();
            $table->string('gplus_event', 255)->nullable();
            $table->string('tickets', 255)->nullable();
            $table->string('lanyrd', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('events');
    }
}
