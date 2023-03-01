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
        Schema::create('bucket_in_balls', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bucket_id');
            $table->foreign('bucket_id')->references('id')->on('buckets');
            $table->unsignedBigInteger('ball_size_id');
            $table->foreign('ball_size_id')->references('id')->on('ball_sizes');
            $table->decimal('inbucketball',8,2)->nullable();
            $table->decimal('remaing_ball',8,2)->nullable();
            $table->decimal('bucket_remaing_size')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bucket_in_balls');
    }
};
