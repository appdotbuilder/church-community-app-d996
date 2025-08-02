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
        Schema::create('financial_records', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->decimal('amount', 15, 2);
            $table->enum('type', ['offering', 'special_envelope', 'donation']);
            $table->date('receipt_date');
            $table->string('donor_name')->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            
            $table->index(['type', 'receipt_date']);
            $table->index('receipt_date');
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('financial_records');
    }
};