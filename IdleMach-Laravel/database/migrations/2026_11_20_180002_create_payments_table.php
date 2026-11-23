
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('booking_id')
                ->index()
                ->constrained('bookings')
                ->restrictOnDelete();

            $table->string('payment_reference')->unique();
            $table->decimal('amount', 12, 2);
            $table->string('payment_method');
            $table->string('transaction_id')->nullable();

            // pending, successful, failed, refunded
            $table->string('status');
            $table->timestamp('paid_at')->nullable();

            // NULL for pending/failed attempts; MySQL UNIQUE indexes allow multiple NULLs.
            $table->foreignId('successful_booking_id')
                ->nullable()
                ->unique()
                ->constrained('bookings')
                ->restrictOnDelete();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
