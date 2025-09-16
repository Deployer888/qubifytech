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
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('visitor_id')->constrained()->onDelete('cascade');
            $table->timestamp('auth_time')->useCurrent();
            $table->float('confidence');
            $table->string('auth_method')->default('facial');
            $table->ipAddress('ip_address')->nullable();
            
            // Corrected foreign key definition:
            $table->foreignId('authorised_by')
                  ->nullable()
                  ->constrained('users')
                  ->onDelete('set null');
            
            $table->string('purpose', 500)->nullable();
            $table->string('reference', 1000)->nullable();
            $table->timestamp('checkin');
            $table->timestamp('checkout')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};
