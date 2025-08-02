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
        Schema::create('service_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['sunday', 'group', 'youth', 'children', 'womens', 'mens', 'elderly']);
            $table->string('location')->nullable();
            $table->datetime('scheduled_at');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index(['type', 'scheduled_at']);
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_schedules');
    }
};