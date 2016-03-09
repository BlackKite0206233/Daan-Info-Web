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
            $table->string('groupno',10);
            //$table->integer('postnum');
            $table->string('topictitle',500);
            $table->string('topickeyword',200);
            $table->string('topictype',20);
            $table->timestamp('lastdate');
            $table->text('topiccontent');
            $table->text('pptpos');
            $table->text('pdfpos');
            $table->text('wmvpos');
            $table->text('datpos');
            //$table->string('lastadmin',10);
            //$table->integer('topicsco');
            //$table->integer('topicvediosco');
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
