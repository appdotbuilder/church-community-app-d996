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
        Schema::create('sick_members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('domicile_group');
            $table->string('care_location');
            $table->text('illness_description')->nullable();
            $table->date('care_start_date');
            $table->date('care_end_date')->nullable();
            $table->enum('status', ['active', 'recovered', 'transferred'])->default('active');
            $table->text('notes')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('domicile_group');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sick_members');
    }
};