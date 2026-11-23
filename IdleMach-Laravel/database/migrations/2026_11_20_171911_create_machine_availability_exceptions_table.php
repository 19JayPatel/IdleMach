
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machine_availability_exceptions', function (Blueprint $table) {
            $table->id();

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->cascadeOnDelete();

            $table->date('exception_date');

            // closed, replace_hours, additional_hours, unavailable_period
            $table->string('exception_type', 30);

            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();

            $table->text('reason')->nullable();

            $table->timestamps();

            $table->index(['machine_id', 'exception_date']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machine_availability_exceptions');
    }
};
