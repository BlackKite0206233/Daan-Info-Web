<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStuscooreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stuscoore', function (Blueprint $table) {
            $table->increments('idno');
            $table->string('stuno',10);
            $table->string('scoorelistidno',10);
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
        Schema::drop('stuscoore');
    }
}
