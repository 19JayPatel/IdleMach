
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();

            $table->foreignId('company_id')
                ->constrained('companies')
                ->restrictOnDelete();

            $table->string('machine_code')->unique();
            $table->string('name');
            $table->string('machine_type');

            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->text('description');

            $table->text('address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('pincode', 10);

            $table->decimal('hourly_rate', 10, 2);

            $table->string('approval_status', 20)->default('pending');
            $table->string('operational_status', 20)->default('inactive');

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->foreignId('rejected_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('rejected_at')->nullable();
            $table->text('rejection_reason')->nullable();

            $table->timestamps();

            $table->index(['company_id', 'approval_status']);
            $table->index(['approval_status', 'operational_status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('machines');
    }
};
