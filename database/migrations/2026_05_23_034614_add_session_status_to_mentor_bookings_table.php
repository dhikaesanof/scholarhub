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

                $table->string(
                    'session_status'
                )
                    ->default('UPCOMING')
                    ->after('payment_status');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'mentor_bookings',

            function (Blueprint $table) {

                $table->dropColumn(
                    'session_status'
                );
            }
        );
    }
};