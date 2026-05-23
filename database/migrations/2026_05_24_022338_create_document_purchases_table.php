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
        Schema::create(

            'document_purchases',

            function (Blueprint $table) {

                $table->id();

                $table->foreignId(
                    'student_id'
                )

                ->constrained()

                ->cascadeOnDelete();

                $table->foreignId(
                    'document_id'
                )

                ->constrained()

                ->cascadeOnDelete();

                $table->enum(

                    'payment_status',

                    [
                        'PENDING',
                        'PAID',
                    ]

                )->default(
                    'PENDING'
                );

                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_purchases');
    }
};
