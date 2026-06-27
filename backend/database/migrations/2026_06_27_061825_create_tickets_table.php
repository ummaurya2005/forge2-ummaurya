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
        Schema::create('tickets', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Organization (Multi-Tenant)
            |--------------------------------------------------------------------------
            */
            $table->foreignId('organization_id')
                  ->constrained()
                  ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Customer & Assigned Agent
            |--------------------------------------------------------------------------
            */
            $table->foreignId('customer_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->foreignId('assigned_to')
                  ->nullable()
                  ->constrained('users')
                  ->nullOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Ticket Details
            |--------------------------------------------------------------------------
            */
            $table->string('title');
            $table->longText('description');

            $table->string('category')->default('General');

            /*
            |--------------------------------------------------------------------------
            | Priority
            |--------------------------------------------------------------------------
            | Low
            | Medium
            | High
            | Critical
            |--------------------------------------------------------------------------
            */
            $table->string('priority')->default('Medium');

            /*
            |--------------------------------------------------------------------------
            | Status
            |--------------------------------------------------------------------------
            | Open
            | In Progress
            | Pending
            | Resolved
            | Closed
            |--------------------------------------------------------------------------
            */
            $table->string('status')->default('Open');

            /*
            |--------------------------------------------------------------------------
            | Attachments
            |--------------------------------------------------------------------------
            */
            $table->string('attachment')->nullable();

            /*
            |--------------------------------------------------------------------------
            | SLA / Timeline
            |--------------------------------------------------------------------------
            */
            $table->timestamp('due_date')->nullable();
            $table->timestamp('closed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};