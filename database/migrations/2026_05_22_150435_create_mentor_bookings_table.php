<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'mentor_bookings',

            function (Blueprint $table) {

                $table->id();

                $table->foreignId('student_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignId('mentor_id')
                    ->constrained()
                    ->cascadeOnDelete();

                $table->foreignId(
                    'mentor_availability_id'
                )
                    ->constrained()
                    ->cascadeOnDelete();

                $table->string('status')
                    ->default('BOOKED');

                $table->timestamps();
            }
        );
    }

    public function down(): void
    {
        Schema::dropIfExists(
            'mentor_bookings'
        );
    }
};