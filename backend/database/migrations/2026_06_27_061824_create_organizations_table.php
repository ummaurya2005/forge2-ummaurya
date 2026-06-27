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
    Schema::create('organizations', function (Blueprint $table) {
        $table->id();

        // Basic Information
        $table->string('name');
        $table->string('slug')->unique();
        $table->string('logo')->nullable();

        // Contact Information
        $table->string('email')->nullable();
        $table->string('phone')->nullable();
        $table->string('website')->nullable();

        // Address
        $table->string('address')->nullable();
        $table->string('city')->nullable();
        $table->string('state')->nullable();
        $table->string('country')->nullable();
        $table->string('postal_code')->nullable();

        // Organization Status
        $table->boolean('is_active')->default(true);

        $table->timestamps();
    });
}
};
