<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScoorelistidnoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scoorelistidno', function (Blueprint $table) {
            $table->increments('scoorelistidno');
            $table->string('scoorename',20);
            $table->float('persent');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scoorelistidno');
    }
}
