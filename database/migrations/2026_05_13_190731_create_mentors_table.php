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
        Schema::create('mentors', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('full_name');

            $table->string('university');

            $table->string('major');

            $table->text('bio')
                ->nullable();

            $table->text('achievements')
                ->nullable();

            $table->string('specialization')
                ->nullable();

            $table->text('telegram_link')
                ->nullable();

            $table->text('gmeet_link')
                ->nullable();

            $table->string('instagram_username')
                ->nullable();

            $table->decimal('average_rating', 3, 2)
                ->default(0);

            $table->decimal('session_price', 10, 2)
                ->default(0);

            $table->softDeletes();

            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
