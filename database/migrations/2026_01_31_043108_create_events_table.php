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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('tenant_key', 64)->nullable(false);
            $table->string('device_uid', 64);
            $table->string('event_uid', 64)->nullable(false);
            $table->string('type', 64);
            $table->timestamp('occurred_at');
            $table->json('payload');

            $table->unique(['tenant_key', 'event_uid']);

            $table->timestamps();
            $table->softDeletes();


            // im creating indexes here with out creating new table
            $table->index(['tenant_key', 'device_uid']);
            $table->index(['tenant_key', 'type']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
