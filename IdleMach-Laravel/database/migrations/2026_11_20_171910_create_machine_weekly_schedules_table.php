
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machine_weekly_schedules', function (Blueprint $table) {
            $table->id();

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->cascadeOnDelete();

            // Monday = 1, Tuesday = 2, ..., Sunday = 7
            $table->unsignedTinyInteger('day_of_week');

            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['machine_id', 'day_of_week']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machine_weekly_schedules');
    }
};
