
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_deadline_rules', function (Blueprint $table) {
            $table->id();

            $table->decimal('min_amount', 12, 2);
            $table->decimal('max_amount', 12, 2)->nullable();
            $table->unsignedInteger('deadline_minutes');
            $table->boolean('is_active')->default(true);

            $table->timestamps();

            $table->index(['min_amount', 'max_amount']);
            $table->index(['is_active', 'min_amount']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_deadline_rules');
    }
};
