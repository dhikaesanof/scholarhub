<?php

use Illuminate\Database\Migrations\Migration;

use Illuminate\Database\Schema\Blueprint;

use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table(
            'mentor_availabilities',

            function (Blueprint $table) {

                $table->unique([

                    'mentor_id',

                    'date',

                    'start_time',

                ], 'mentor_schedule_unique');
            }
        );
    }

    public function down(): void
    {
        Schema::table(
            'mentor_availabilities',

            function (Blueprint $table) {

                $table->dropUnique(
                    'mentor_schedule_unique'
                );
            }
        );
    }
};