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
        if (Schema::hasTable('laptop_hire_requests')) {
            Schema::table('laptop_hire_requests', function (Blueprint $table) {
                $table->boolean('email_sent')->default(false)->after('status');
                $table->text('email_error')->nullable()->after('email_sent');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('laptop_hire_requests')) {
            Schema::table('laptop_hire_requests', function (Blueprint $table) {
                $table->dropColumn(['email_sent', 'email_error']);
            });
        }
    }
};
