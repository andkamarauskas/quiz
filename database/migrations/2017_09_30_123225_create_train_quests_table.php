<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainQuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('train_quests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('train_id')->unsigned();
            $table->integer('quest_id')->unsigned();
            $table->boolean('used')->default(false);
            $table->boolean('correct')->default(false);
            $table->foreign('train_id')->references('id')->on('trains')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('quest_id')->references('id')->on('quests')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('train_quests');
    }
}
