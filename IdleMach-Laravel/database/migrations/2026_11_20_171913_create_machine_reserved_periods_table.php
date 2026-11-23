
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machine_reserved_periods', function (Blueprint $table) {
            $table->id();

            $table->foreignId('machine_id')
                ->constrained('machines')
                ->cascadeOnDelete();

            $table->date('reserved_date');
            $table->time('start_time');
            $table->time('end_time');

            $table->text('reason')->nullable();

            $table->string('status', 20)->default('active');

            $table->timestamps();

            $table->index(['machine_id', 'reserved_date', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machine_reserved_periods');
    }
};
