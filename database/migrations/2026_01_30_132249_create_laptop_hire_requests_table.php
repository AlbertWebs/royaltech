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
        Schema::create('laptop_hire_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('pickup_date');
            $table->integer('number_of_laptops');
            $table->text('desired_specs');
            $table->enum('status', ['pending', 'contacted', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            
            // Indexes for better query performance
            $table->index('email');
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laptop_hire_requests');
    }
};
