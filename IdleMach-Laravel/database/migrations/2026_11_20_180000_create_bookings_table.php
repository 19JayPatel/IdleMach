
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('booking_number')->unique();

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->restrictOnDelete();

            $table->foreignId('buyer_id')
                ->constrained('users')
                ->restrictOnDelete();

            $table->date('required_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->decimal('required_hours', 10, 2);
            $table->text('work_description');
            $table->string('material')->nullable();
            $table->decimal('quantity', 10, 2)->nullable();
            $table->text('special_requirements')->nullable();

            $table->decimal('hourly_rate', 10, 2);
            $table->decimal('total_amount', 12, 2);

            $table->string('status')->default('pending');
            $table->timestamp('accepted_at')->nullable();
            $table->timestamp('payment_deadline_at')->nullable();

            $table->timestamp('cancelled_at')->nullable();
            $table->foreignId('cancelled_by')
                ->nullable()
                ->index()
                ->constrained('users')
                ->restrictOnDelete();
            $table->text('cancellation_reason')->nullable();

            $table->timestamp('work_started_at')->nullable();
            $table->timestamp('work_completed_at')->nullable();
            $table->timestamp('completion_confirmed_at')->nullable();

            $table->text('dispute_reason')->nullable();
            $table->timestamp('disputed_at')->nullable();

            $table->timestamps();

            $table->index(['machine_id', 'required_date', 'status']);
            $table->index(['buyer_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
