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
        Schema::create('memory_trials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('experiment_session_id');
            $table->foreign('experiment_session_id', 'fk_memory_trials_session')
              ->references('id')->on('experiment_sessions')
              ->onDelete('cascade');
            $table->index('experiment_session_id', 'idx_memory_trials_session');

            $table->unsignedInteger('trial_number');
            $table->unsignedInteger('items_count');
            $table->unsignedInteger('correct_count');
            $table->decimal('accuracy',5, 3);
            $table->json('meta')->nullable();
            $table->timestamps();
            $table->unique(['experiment_session_id','trial_number']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('memory_trials');
    }
};
