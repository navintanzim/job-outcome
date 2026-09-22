<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_status_history', function (Blueprint $table) {
            $table->id();

            $table->foreignId('application_report_id')
                ->constrained('application_reports')
                ->cascadeOnDelete();
            $table->string('status', 50);
            $table->timestamp('occurred_at');
            $table->timestamps();
            $table->index('application_report_id');
            $table->index('status');
            $table->index(
                ['application_report_id', 'occurred_at'],
                'ash_report_occurred_idx'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_status_history');
    }
};