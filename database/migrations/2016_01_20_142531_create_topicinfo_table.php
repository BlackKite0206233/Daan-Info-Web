<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTopicinfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topicinfo', function (Blueprint $table) {
            $table->increments('idno');
            $table->string('groupno');//user topicgroup
            $table->integer('postnum');
            $table->string('topictitle');
            $table->string('topickeyword');
            $table->string('topictype');//topictype idno
            $table->text('topiccontent');
            $table->text('pic');
            $table->text('ppt');
            $table->text('pdf');
            $table->text('video');
            $table->text('data');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('topicinfo');
    }
}
