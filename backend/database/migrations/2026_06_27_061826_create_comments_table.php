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
        Schema::create('comments', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Relationships
            |--------------------------------------------------------------------------
            */

            // Ticket to which this comment belongs
            $table->foreignId('ticket_id')
                  ->constrained()
                  ->cascadeOnDelete();

            // User who wrote the comment
            $table->foreignId('user_id')
                  ->constrained()
                  ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Comment Details
            |--------------------------------------------------------------------------
            */

            $table->longText('message');

            /*
            |--------------------------------------------------------------------------
            | Internal Notes
            |--------------------------------------------------------------------------
            | false = Visible to customer
            | true  = Visible only to Admin & Agent
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_internal')->default(false);

            /*
            |--------------------------------------------------------------------------
            | Optional Attachment
            |--------------------------------------------------------------------------
            */

            $table->string('attachment')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};