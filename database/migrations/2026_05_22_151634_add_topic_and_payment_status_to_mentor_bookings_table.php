<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'mentor_bookings',

            function (Blueprint $table) {

                $table->string('topic')
                    ->nullable();

                $table->string(
                    'payment_status'
                )
                    ->default('UNPAID');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'mentor_bookings',

            function (Blueprint $table) {

                $table->dropColumn([

                    'topic',

                    'payment_status',
                ]);
            }
        );
    }
};