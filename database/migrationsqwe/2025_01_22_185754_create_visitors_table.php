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
        Schema::create('visitors', function (Blueprint $table) {
            $table->id();
            $table->string('reference_id')->unique();
            $table->string('name');
            $table->bigInteger('aadhar_number');
            $table->string('gender', 1); // M, F, or Other
            $table->date('date_of_birth')->nullable();
            $table->integer('year_of_birth')->nullable();
            $table->string('mobile_hash')->nullable();
            $table->string('email_hash')->nullable();
            $table->string('care_of')->nullable();
            $table->text('full_address');

            // Address fields
            $table->string('house')->nullable();
            $table->string('street')->nullable();
            $table->string('landmark')->nullable();
            $table->string('vtc')->nullable();
            $table->string('subdistrict')->nullable();
            $table->string('district')->nullable();
            $table->string('state');
            $table->string('country');
            $table->integer('pincode');

            $table->string('photo', 500)->nullable();
            $table->text('photo_encoded')->nullable(); // Base64 encoded string
            $table->string('share_code')->nullable();
            $table->string('invite')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitors');
    }
};
