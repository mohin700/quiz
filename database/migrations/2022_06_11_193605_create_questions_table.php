<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('quiz_id')->unsigned();
            $table->string('title');
            $table->integer('duration')->nullable();
            $table->integer('order')->nullable();
            $table->string('status')->default('active');
            $table->timestamps();


            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
};
