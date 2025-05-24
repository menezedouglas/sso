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
        Schema::create('audit_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('tenant_id')->constrained('tenants');
            $table->foreignId('application_id')->nullable()->constrained('applications');
            $table->foreignId('type_id')->constrained('audit_log_types');
            $table->string('ip_address');
            $table->string('user_agent');
            $table->string('device');
            $table->json('location')->nullable();
            $table->string('message');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('audit_logs');
    }
};
