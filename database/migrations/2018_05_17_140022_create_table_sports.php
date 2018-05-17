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
            $table->string('object_id', 60);
            $table->string('group_name', 60);
            $table->string('group_id', 60);
            $table->string('away_name', 60);
            $table->string('home_name', 60);
            $table->string('players_name', 150);
            $table->string('sports', 60);
            $table->string('country', 60);
            $table->string('state', 60);
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
