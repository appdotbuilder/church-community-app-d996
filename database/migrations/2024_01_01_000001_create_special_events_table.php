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
        Schema::create('special_events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->enum('type', ['communion', 'baptism', 'confession', 'confirmation', 'marriage']);
            $table->string('location')->nullable();
            $table->datetime('event_date');
            $table->boolean('is_active')->default(true);
            $table->text('requirements')->nullable();
            $table->timestamps();
            
            $table->index(['type', 'event_date']);
            $table->index('is_active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_events');
    }
};