<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    if (!Schema::hasTable('jobs')) {
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('category');
            $table->string('budget_type')->default('fixed');
            $table->decimal('budget_min', 10, 2)->nullable();
            $table->decimal('budget_max', 10, 2)->nullable();
            $table->string('skills_required')->nullable();
            $table->string('location')->default('Remote');
            $table->enum('status', ['open', 'in_progress', 'completed', 'closed'])->default('open');
            $table->date('deadline')->nullable();
            $table->timestamps();
        });
    }
}

    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};