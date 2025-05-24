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
        Schema::create('user_tenants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('tenant_id')->constrained('tenants');
            $table->foreignId('role_id')->constrained('roles');
            $table->boolean('is_owner')->default(false);
            $table->boolean('is_active')->default(true);
            $table->boolean('is_invited')->default(false);
            $table->boolean('is_blocked')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_tenants');
    }
};
