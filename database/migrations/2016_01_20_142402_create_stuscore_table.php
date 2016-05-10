<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuscoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuscore', function (Blueprint $table) {
            $table->increments('idno');
            $table->string('stuno');//user acc
            $table->string('scoretype');//scorelist id
            $table->integer('scoore');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stuscore');
    }
}
