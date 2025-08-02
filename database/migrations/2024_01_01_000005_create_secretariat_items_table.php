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
        Schema::create('secretariat_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->enum('type', ['birthday', 'new_member', 'intern', 'diakonia_commission', 'worship_commission', 'special_fund', 'council_decision']);
            $table->date('announcement_date');
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            
            $table->index(['type', 'announcement_date']);
            $table->index('is_published');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secretariat_items');
    }
};