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
        Schema::create('custom_seos', function (Blueprint $table) {
            $table->id(); // bigint(20) unsigned primary key
            $table->unsignedBigInteger('page_id'); // Reference to page
            $table->unsignedBigInteger('page_type_id')->nullable(); // Page type identifier (nullable)
            $table->json('content_json'); // All SEO data as JSON
            $table->timestamps(); // created_at and updated_at timestamps

            // Indexes for better performance
            $table->index('page_id');
            $table->index('page_type_id');
            
            // Unique constraint to prevent duplicate entries
            $table->unique(['page_id', 'page_type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_seos');
    }
};
