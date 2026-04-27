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
        Schema::create('visits', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->string('ip_address', 45)->nullable();
            $blueprint->string('url')->index();
            $blueprint->string('method', 10)->default('GET');
            $blueprint->text('referer')->nullable();
            $blueprint->text('user_agent')->nullable();
            $blueprint->string('country_code', 5)->nullable();
            $blueprint->string('country_name')->nullable();
            $blueprint->string('city')->nullable();
            $blueprint->string('device')->nullable(); // mobile, desktop, tablet
            $blueprint->string('browser')->nullable();
            $blueprint->string('platform')->nullable();
            $blueprint->boolean('is_bot')->default(false);
            $blueprint->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
