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
        Schema::create('reaction_trials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('experiment_session_id');
            $table->foreign('experiment_session_id', 'fk_reaction_trials_session')
              ->references('id')->on('experiment_sessions')
              ->onDelete('cascade');
            $table->index('experiment_session_id', 'idx_reaction_trials_session');

            $table->unsignedInteger('stimulus_ms');
            $table->unsignedInteger('response_ms');
            $table->unsignedInteger('latency_ms');
            $table->boolean('correct')->default(true);
            $table->json('meta')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reaction_trials');
    }
};
