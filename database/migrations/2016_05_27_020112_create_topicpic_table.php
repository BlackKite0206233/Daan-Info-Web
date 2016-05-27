<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicpicTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topicpic', function (Blueprint $table) {
            $table->increments('idno');
            $table->string('groupno');
            $table->text('memberpic');
            $table->text('structurepic');
            $table->text('productpic');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topicpic');
    }
}
