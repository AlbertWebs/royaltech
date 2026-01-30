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
        if (!Schema::hasTable('sent_messages')) {
            Schema::create('sent_messages', function (Blueprint $table) {
                $table->id();
                $table->string('to_email');
                $table->string('to_name')->nullable();
                $table->string('from_email')->nullable();
                $table->string('from_name')->nullable();
                $table->string('subject');
                $table->text('message');
                $table->string('message_type')->default('reply'); // reply, notification, test, etc.
                $table->unsignedBigInteger('related_message_id')->nullable(); // If replying to a message
                $table->unsignedBigInteger('sent_by')->nullable(); // Admin user ID
                $table->boolean('email_sent')->default(false);
                $table->text('email_error')->nullable();
                $table->timestamps();
                
                // Indexes
                $table->index('to_email');
                $table->index('sent_by');
                $table->index('message_type');
                $table->index('created_at');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sent_messages');
    }
};
