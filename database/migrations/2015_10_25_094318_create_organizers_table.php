<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organizers', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('created_by');
            $table->integer('updated_by');

            $table->integer('usergroup_id')->nullable();
            $table->integer('country_id');
            $table->string('name', 255);
            $table->string('company', 255);
            $table->string('street_address_1', 255);
            $table->string('street_address_2', 255);
            $table->string('co', 255);
            $table->string('postbox', 255);
            $table->string('postal_code', 255);
            $table->string('locality', 255);
            $table->string('region', 255);
            $table->double('latitude');
            $table->double('longitude');
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
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('organizers');
    }
}
