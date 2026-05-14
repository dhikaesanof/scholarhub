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
        Schema::create('scholarships', function (Blueprint $table) {

            $table->id();

            $table->string('title');

            $table->string('provider');

            $table->text('description');

            $table->text('requirements')
                ->nullable();

            $table->string('education_level');

            $table->string('category');

            $table->string('funding_type');

            $table->date('deadline');

            $table->text('registration_link')
                ->nullable();

            $table->text('thumbnail')
                ->nullable();

            $table->enum('status', [
                'OPEN',
                'CLOSED',
                'COMING_SOON'
            ])->default('OPEN');

            $table->foreignId('created_by')
                ->constrained('admins')
                ->onDelete('cascade');

            $table->softDeletes();

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
