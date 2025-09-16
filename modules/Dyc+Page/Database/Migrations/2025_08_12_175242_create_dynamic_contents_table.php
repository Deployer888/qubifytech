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
        Schema::create('dynamic_contents', function (Blueprint $table) {
            $table->id();
            $table->foreignId('page_id')->constrained('pages')->onDelete('cascade');
            $table->foreignId('page_type_id')->constrained('page_types')->onDelete('cascade');
            $table->string('section_name')->nullable();
            $table->json('content_json')->nullable();
            $table->integer('order_by')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            // Add index for better performance
            $table->index(['page_id', 'is_active', 'order_by']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dynamic_contents');
    }
};
