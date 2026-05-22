<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'mentor_reviews',

            function (Blueprint $table) {

                $table->id();

                $table->foreignId(
                    'mentor_booking_id'
                )
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignId('student_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignId('mentor_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->integer('rating');

                $table->text('review')
                    ->nullable();

                $table->json('strengths')
                    ->nullable();

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'mentor_reviews'
        );
    }
};