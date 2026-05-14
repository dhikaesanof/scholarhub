<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assessment_answers', function (Blueprint $table) {

            $table->id();

            $table->foreignId('assessment_result_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('assessment_question_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('answer');

            $table->integer('score')
                ->default(0);

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assessment_answers');
    }
};
