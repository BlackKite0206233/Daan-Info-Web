<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGradeinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gradeinfo', function (Blueprint $table) {
            $table->increments('gradeidno');
            $table->string('gradeno',10);
            $table->string('teacherno',10);
            $table->text('content');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('gradeinfo');
    }
}
