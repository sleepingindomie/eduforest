<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningOutcomesTable extends Migration
{
    public function up()
    {
        Schema::create('learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->string('outcome');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('learning_outcomes');
    }
}

