<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSports extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sports', function (Blueprint $table) {
            $table->increments('id');
            $table->string('object_id');
            $table->string('group_name');
            $table->unsignedInteger('group_id');
            $table->string('away_name');
            $table->string('home_name');
            $table->string('players_name');
            $table->string('sports');
            $table->string('country');
            $table->string('state');
            $table->timestamp('event_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sports');
    }
}
