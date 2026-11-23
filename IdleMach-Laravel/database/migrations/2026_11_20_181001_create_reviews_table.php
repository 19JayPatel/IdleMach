
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->unique()
                ->constrained('bookings')
                ->restrictOnDelete();

            $table->foreignId('reviewer_id')
                ->index()
                ->constrained('users')
                ->restrictOnDelete();

            $table->foreignId('reviewee_id')
                ->index()
                ->constrained('users')
                ->restrictOnDelete();

            // 1-5; enforced by application logic (Laravel 13 has no CHECK API).
            $table->unsignedTinyInteger('rating');

            $table->text('comment')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
