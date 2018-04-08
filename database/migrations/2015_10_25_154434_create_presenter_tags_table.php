<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePresenterTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('presenter_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('presenter_id');
            $table->integer('tag_id');

            $table->unique(['presenter_id', 'tag_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('presenter_tags');
    }
}
