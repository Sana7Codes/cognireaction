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
        Schema::table('memory_trials', function (Blueprint $table) {
            $table -> double('accuracy', 8, 6 )->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('memory_trials', function (Blueprint $table) {
            $table->decimal('accuracy', 5, 3)->change();
        });
    }
};
