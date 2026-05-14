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
        Schema::table('scholarships', function (Blueprint $table) {

            $table->text('benefits')
                  ->nullable()
                  ->after('description');

            $table->decimal('minimum_gpa', 3, 2)
                  ->nullable()
                  ->after('requirements');

            $table->text('required_documents')
                  ->nullable()
                  ->after('minimum_gpa');

            $table->date('registration_open_date')
                  ->nullable()
                  ->after('funding_type');

            $table->date('announcement_date')
                  ->nullable()
                  ->after('deadline');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('scholarships', function (Blueprint $table) {

            $table->dropColumn([
                'benefits',
                'minimum_gpa',
                'required_documents',
                'registration_open_date',
                'announcement_date',
            ]);

        });
    }
};
