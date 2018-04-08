<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('series', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');

            $table->integer('organizer_id');
            $table->string('name', 255);
            $table->string('image', 255)->nullable();
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('series');
    }
}
