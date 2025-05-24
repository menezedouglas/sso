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
        Schema::create('tenant_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tenant_id')->constrained('tenants');
            $table->foreignId('default_role_id')->constrained('roles');
            $table->foreignId('branding_id')->nullable()->constrained('brandings');
            $table->boolean('twilio_enabled')->default(false);
            $table->string('twilio_sid')->nullable();
            $table->string('twilio_token')->nullable();
            $table->string('twilio_from')->nullable();
            $table->boolean('rbac_enabled')->default(false);
            $table->boolean('allow_social_login')->default(false);
            $table->json('allowed_providers')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_settings');
    }
};
