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
        Schema::create('user_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->boolean('2fa_email_enabled')->default(false);
            $table->boolean('2fa_whatsapp_enabled')->default(false);
            $table->boolean('2fa_sms_enabled')->default(false);
            $table->string('phone_number')->nullable();
            $table->char('language', 5)->nullable();
            $table->char('timezone', 10)->nullable();
            $table->boolean('notifications_enabled')->default(true);
            $table->boolean('dark_mode')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**sa
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_settings');
    }
};
