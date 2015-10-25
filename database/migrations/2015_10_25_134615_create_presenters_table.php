<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresentersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presenters', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');

            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('phone', 255);
            $table->string('fax', 255);
            $table->string('cell', 255);
            $table->string('web', 255);
            $table->string('facebook', 255);
            $table->string('twitter', 255);
            $table->string('xing', 255);
            $table->string('gplus', 255);
            $table->string('image', 255);
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
        Schema::drop('presenters');
    }
}
