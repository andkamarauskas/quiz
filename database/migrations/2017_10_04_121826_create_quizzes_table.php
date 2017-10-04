<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
            Schema::create('quizzes', function(Blueprint $table) {
                $table->increments('id');
                $table->string('title');
                $table->text('about');
                $table->integer('persons_num');
                $table->integer('quests_num');
                $table->date('date');
                $table->time('time');

                $table->timestamps();
                $table->softDeletes();
            });
            
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('quizzes');
    }

}
