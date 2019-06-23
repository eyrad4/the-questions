<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('text');
            $table->unsignedInteger('views')->default(0);
            $table->integer('votes')->default(0);
            $table->unsignedInteger('best_answer_id')->nullable();
            $table->timestamps();
        });

        Schema::table('questions', function (Blueprint $table) {
           $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropForeign('questions_id_foreign');
        });

        Schema::dropIfExists('questions');
    }
}