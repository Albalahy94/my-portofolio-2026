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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->json('title'); // {ar: "...", en: "..."}
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->json('description')->nullable(); // Short description
            $table->json('content')->nullable(); // Full details
            $table->json('technologies')->nullable(); // ["Laravel", "Vue"]
            $table->json('links')->nullable(); // {github: "...", demo: "..."}
            $table->foreignId('related_post_id')->nullable()->constrained('posts')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
