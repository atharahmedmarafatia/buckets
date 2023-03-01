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
        Schema::create('ball_sizes', function (Blueprint $table) {
            $table->id();
            $table->string('ball_name')->nullable();
            $table->decimal('ball_size')->nullable();
            $table->integer('ball_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ball_sizes');
    }
};
